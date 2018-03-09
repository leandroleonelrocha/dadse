<?php
namespace App\Http\Controllers;
use App\Entities\Casos;
use App\Entities\Documentos;
use App\Entities\Prestaciones;
use App\Entities\PersonasFisicas;
use App\Http\Functions\InsolFunction;
use App\Http\Repositories\CasosRepo;
use App\Http\Repositories\DocumentosRepo;
use App\Http\Repositories\PersonasFisicasRepo;
use App\Http\Repositories\MandatariosRepo;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class InsolController extends Controller
{
    protected $clasificaciones;
    protected $solicitudesApiRepo;
    protected $insolFunction;
    protected $personasFisicasRepo;
    protected $documentoRepo;

    public function __construct( InsolFunction $insolFunction, PersonasFisicasRepo $personasFisicasRepo,DocumentosRepo $documentoRepo)
    {
       // $this->solicitudesApiRepo = $solicitudesApiRepo;
        $this->insolFunction = $insolFunction;
        $this->personasFisicasRepo = $personasFisicasRepo;
        $this->documentoRepo       = $documentoRepo;
    }

    public function getPendientes()
    {
        $this->insolFunction->getCasos();
        
        if ($this->insolFunction->getHttpCode() != 200) abort(500);
            $casos = $this->insolFunction->getResultado()->results;


        return view('insol.pendientes', compact('casos'));
    }

    public function getPendientesToday()
    {
        $this->insolFunction->getCasosPendientesToday();

        if ($this->insolFunction->getHttpCode() != 200) abort(500);

        $casos = $this->insolFunction->getResultado()->results;

        return view('insol.pendientes-today', compact('casos'));
    }

    public function getPendientesDetail(Route $route)
    {
      $this->insolFunction->getCasosDetalle($route->getParameter('id')) ;

        if ($this->insolFunction->getHttpCode() != 200) abort(500);

        $casos = $this->insolFunction->getResultado()->result;

        #dd($casos);


        // Beneficiario
        switch ($casos->destinatario_type) {
            case 'persona':
                $this->insolFunction->getPersona($casos->destinatario->id);
                break;

            case 'organizacion':
                $this->insolFunction->getOrganizacion($casos->destinatario->id);
                break;
        }


        if ($this->insolFunction->getHttpCode() != 200) abort(500);
            $beneficiario = $this->insolFunction->getResultado()->result;


        // Prestaciones
        // $this->insolFunction->getPrestacionesSolicitud($casos->solicitudId);

        //if ($this->insolFunction->getHttpCode() != 200) abort(500);
        //  $prestaciones = $this->insolFunction->getResultado()->results;

        // Clasificaciones
        //$this->insolFunction->getClasificaciones();

        //if ($this->insolFunction->getHttpCode() != 200) abort(500);
        //  $clasificaciones = $this->insolFunction->getResultado()->results;

        return view('insol.pendientes_detail', compact('casos', 'beneficiario'));
    }

    /*
    public function recategorizarPrestacion(Route $route, Request $request)
    {
        $this->insolFunction->updatePrestacion($route->getParameter('idPrestacion'), $request->get('clasificacion_id'));
        if ($this->insolFunction->getHttpCode() != 200) abort(500);

        return redirect()->back()->with('msg_ok', 'La prestación fue reclasificada correctamente.');
    }
    */

    public function aceptarSolicitud(Route $route, Casos $casos, CasosRepo $casosRepo, Request $request, MandatariosRepo $mandatariosRepo)
    {

        $casosId = $route->getParameter('id');
        $casos = $casos->find($casosId);
        $this->insolFunction->getCasosDetalle($casosId);
        $casosApi = $this->insolFunction->getResultado()->result;
 
        //si el caso ya se encuentra en la db
        if (is_null($casos))
        {
            $nuevo = new Casos();
            $nuevo->id = $casosApi->id;
            $nuevo->user_id = $casosApi->user->id;
            $nuevo->user_full_name = $casosApi->user->fullname;
            $nuevo->user_user_name = $casosApi->user->username;
            $nuevo->estado_id = $casosApi->estado->id;
            $nuevo->estado_nombre = $casosApi->estado->nombre;
            $nuevo->estado_slug = $casosApi->estado->slug;
            $nuevo->observaciones = $casosApi->observaciones;
            $nuevo->destinatario_type = $casosApi->destinatario_type;
            $nuevo->canal_id = $casosApi->canal->id;
            $nuevo->canal_nombre = $casosApi->canal->nombre;
            $nuevo->destinatario_type = $casosApi->destinatario_type;
            $nuevo->ayuda_directa  =  $casosApi->tipo->slug === "dadse.ayuda.directa" ? "1" : "0";
            $nuevo->alto_costo     =  $casosApi->tipo->slug === "dadse.alto.costo" ? "1" : "0";
            //$casosRepo->actualizaMovimientos($nuevo->id, 1);
           
            if($casosApi->destinatario_type == 'persona')
            {
                //$persona = $this->personasFisicasRepo->find($casosApi->destinatario->id);
                $persona = PersonasFisicas::find($casosApi->destinatario->id);

                if (is_null($persona))
                {
                    $this->insolFunction->getPersona($casosApi->destinatario->id);
                    $personaData = $this->insolFunction->getResultado();
                    $this->personasFisicasRepo->addNew($personaData);
                }

                $nuevo->personas_fisicas_id = $casosApi->destinatario->id;
            }
                else
            {
                $nuevo->organizaciones_id = $casosApi->destinatario->id;
            }

            $nuevo->save();
            /*
            Prestacion por defecto
            */
            $prestacion = new Prestaciones();
            $prestacion->casos_id = $casosApi->id;
            $prestacion->estado = $casosApi->tipo->slug === "dadse.ayuda.directa" ? "4" : "5"; 
            $prestacion->descripcion = 'Medicamentos según recetas adjuntas';
            $prestacion->cantidad = 1;
            $prestacion->unidad_medida = 'Unidad';
            $prestacion->save();
            
            // INGRESA LOS DOCUMENTOS DESDE LA API A LA DB DE DADSE ( 5/6  FEDE DIJO Q SE CONSULTE DIRECTO X API )
            //$casos_id  = $casosRepo->ultimo();
            
            $insolFunction =  new InsolFunction();
            $insolFunction->getCasosDetalle($casosApi->id);
            if(!isset($insolFunction->getResultado()->error)){
                $mandatario = $insolFunction->getResultado()->result;
                 if(!empty($mandatario)){
                    if(!empty($mandatario->mandatarios)){
                        $dato['fullname']       = $mandatario->mandatarios[0]->fullname;
                        $dato['documento']      = $mandatario->mandatarios[0]->documento;
                        $dato['tipo_documento'] = $mandatario->mandatarios[0]->tipo_documento->slug;
                        $dato['casos_id']       = $casosApi->id;
                        $mandatariosRepo->create($dato);
                    }
                }
            }
          
            /*
            $this->insolFunction->getDocumentos($casosId);
            $documento = $this->insolFunction->getResultado()->results;
            foreach ($documento as $d) {
                $nuevo_documento = new Documentos();
                $nuevo_documento->file_type         = $d->file_type;
                $nuevo_documento->file_size         = $d->file_size;
                $nuevo_documento->file_extensions   = $d->file_extension;

                $nuevo_documento->descripcion       = $d->descripcion;
                $nuevo_documento->casos_id          = $casos_id->id;
                $nuevo_documento->user_id           = $d->user->id;
                $nuevo_documento->save();
                
                $last_doc = Documentos::all()->last()->id;
                $this->insolFunction->getFile($d->id);
                $new = $this->insolFunction->getResultado()->result;
                
                $file = base64_decode($new->file);
                file_put_contents(public_path().'/file/'.$last_doc.'.'.$d->file_extension, $file);
            }

            */

            //Creacion de prestaciones segun intervencion
            //$intervenciones = ($request->has('ayuda_directa')) + ($request->has('alto_costo'));


             //if($request->has('ayuda_directa'))
             //    echo('ad');

             // if($request->has('alto_costo'))
             //   echo('ac');


                    /*
                    //if($intervenciones == 1 && $request->has('ayuda_directa'))
                    if($request->has('ayuda_directa'))
                    {
                        //Ayuda directa
                        $prestacion = new Prestaciones();
                        $prestacion->casos_id = $casos_id->id;
                        $prestacion->estado = 4; 
                        $prestacion->descripcion = 'Medicamentos según recetas adjuntas';
                        $prestacion->cantidad = 1;
                        $prestacion->unidad_medida = 'Unidad';
                        $prestacion->save();
                    }
                              
                    //if($intervenciones == 1 && $request->has('alto_costo'))
                    if($request->has('alto_costo'))
                    {
                        //Alto costo
                        $prestacion = new Prestaciones();
                        $prestacion->casos_id = $casos_id->id;
                        $prestacion->estado = 5; 
                        $prestacion->save();
                    }
                    */
//                    if($intervenciones == 2)
//                    {
//                        //Ayuda directa
//                        $prestacion = new Prestaciones();
//                        $prestacion->casos_id = $casos_id->id;
//                        $prestacion->estado = 4;
//                        $prestacion->descripcion = 'Medicamentos según recetas adjuntas';
//                        $prestacion->cantidad = 1;
//                        $prestacion->unidad_medida = 'Unidad';
//                        $prestacion->save();
//
//                        //Alto costo
//                        $prestacion = new Prestaciones();
//                        $prestacion->casos_id = $casos_id->id;
//                        $prestacion->estado = 5;
//                        $prestacion->save();
//                    }
            

            //$this->insolFunction->getDocumentos($casosId);
            //$documentosApi = $this->insolFunction->getResultado()->results;

         }


        //modifica estado en insol
        $this->insolFunction->patchCasos($casosId, 'curso');


        return redirect()->route('casos.show',$casosId)->with('msg_ok', 'El Caso fue Aceptado.');
    }

    public function rechazarSolicitud(Route $route){
        $casosId = $route->getParameter('id');
        //dd($casosId);
        $motivo = "Caso repetido o no corresponde";
        $this->insolFunction->patchCasos($casosId, 'rechazado', $motivo);

        return redirect()->route('insol.pendientes')->with('msg_danger', 'El Caso fue Rechazado.');
    }

}
