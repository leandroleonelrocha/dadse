<?php
namespace App\Http\Controllers;
use App\Http\Functions\InsolFunction;
use App\Http\Repositories\AltoCostoMedicosRepo;
use App\Http\Repositories\AltoCostoRepo;
use App\Http\Repositories\CasosRepo;
use App\Http\Repositories\MedicosRepo;
use App\Http\Repositories\DocumentosRepo;
use App\Http\Repositories\PrestacionesRepo;
use App\Http\Repositories\SolicitudesApiRepo;
use App\Http\Repositories\SolicitudRepo;
use App\Entities\CuentaCorriente;
use App\Entities\PersonasFisicas;
use App\Entities\Casos;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\PDF;

class CasosController extends Controller
{
    protected $casosRepo;

    public function __construct(CasosRepo $casosRepo)
    {
        $this->casosRepo = $casosRepo;

        $this->data['seccion']  = 'Solicitudes';
        $this->index            = 'solicitudes.index';
        $this->form             = 'solicitudes.form';
        $this->casos_id        =  session('casos_id');
        
    }

    public function index(InsolFunction $insolFunction, Request $request)
    {
        
        $limit = 25;
        $search =  $request->search;

        if($request->has('search'))
            $casos = $this->casosRepo->search($limit, $request->search);

        else
            $casos = $this->casosRepo->listadoTotal($limit);



        /*
        foreach ($this->solicitudRepo->listadoTotal() as $solicitud) {

            $insolFunction->getSolicitud($solicitud->id);
            array_push($solicitudes, $insolFunction->getResultado()->results);
        }*/


        return view('casos.index', compact('casos','search'));
    }

    public function show(Route $route, InsolFunction $insolFunction, DocumentosRepo $documentosRepo)
    {

        $caso = $this->casosRepo->find($route->getParameter('id'));
        //$total_cuenta = $this->casosRepo->totalCuentaCorriente($caso->id);
        
        if(is_null($insolFunction->getNotas($route->getParameter('id'))))
            $notas = [];
        else    
            $notas = $insolFunction->getResultado()->results;    
        
        // Beneficiario
       
        //$total_cuenta = $this->casosRepo->totalCuentaCorriente($caso->id);
        
        $insolFunction->getNotas($route->getParameter('id'));
        $resNotas = $insolFunction->getResultado();

        if(!isset($resNotas->error))
            $notas = $insolFunction->getResultado()->results;


        $insolFunction->getDocumentos($route->getParameter('id'));
        $resDocs = $insolFunction->getResultado();

        if(!isset($resNotas->error))
            $documentos = $insolFunction->getResultado()->results;
        else
            $documentos = [];

        $suma_monto = $caso->AyudaDirecta->sum('importe_autorizado');
        /*
        $maximo     = CuentaCorriente::all()->first()->valor;
        $monto_disponible = ($maximo - $suma_monto);
        */
        //dd($insolFunction->getResultado()->results);
        //if(is_null($insolFunction->getNotas($route->getParameter('id'))))
         //   $notas = [];
        //else
         //   $notas = $insolFunction->getResultado()->results;


        //if(is_null($insolFunction->getDocumentos($route->getParameter('id'))))
        //    $documentos = [];
        //else
        //    $documentos = $insolFunction->getResultado()->results;



        //Beneficiario

            $insolFunction->getDocumentos($route->getParameter('id'));
            //$documento = $insolFunction->getResultado()->results;
         
         
        switch ($caso->destinatario_type) {
            case 'Organizacion':
                $beneficiario = $caso->PersonasFisicas;
                break;

            case 'Persona':
                $beneficiario = $caso->PersonasFisicas;
                break;
        }

        //Prestaciones

        //$prestaciones = $caso->Prestaciones;

        //guarda id solicitud en variable de session
        Session::put('casos_id', $route->getParameter('id'));

        return view('casos.detalle', compact('caso', 'beneficiario','notas','total_cuenta','documentos','suma_monto','monto_disponible'));
    }
 
    public function getDetalle($solicitudes_id = null, SolicitudesApiRepo $solicitudesApiRepo)
    {

        $data = $solicitudesApiRepo->getSolicitudesConDetalles($solicitudes_id);

        $data['prest'] = Prestaciones::where('solicitudes_id', $solicitudes_id)->get();

        return view('solicitudes.detalle')->with($data);
    }


    //solicita alto costo a los medicos
    public function solicitarAltoCosto(PrestacionesRepo $prestacionesRepo,  Request $request, MedicosRepo $medicosRepo, AltoCostoRepo $altoCostoRepo, AltoCostoMedicosRepo $altoCostoMedicosRepo)
    {

        $medicos_id = $request->medicos_id;

        $newAltoCosto = ['solicitudes_informes_id' => 1, 'prestaciones_id' => $request->prestaciones_id, 'estado' => 1, 'fecha' => date('Y-m-d')];

        $altoCosto = $altoCostoRepo->create($newAltoCosto);
        

        //envia mails a los medicos
        foreach ($medicos_id as $medico)
        {
            $newAltoCostoMedico = ['alto_costo_id' => $altoCosto->id, 'medicos_id' => $medico , 'fecha_envio' => date('Y-m-d'), 'estado' => 1];
            $altoCostoMedicosRepo->create($newAltoCostoMedico);
        }

        $prestacionesRepo->cambiarEstado( $request->prestaciones_id, 2);
        
        //return redirect()->route()->with(['msg_success'=>'Prestacion enviada y en espera de Iforme Médico.']);

        return redirect()->route('casos.show',$this->casos_id)->with(['msg_success'=>'Prestación enviada y en espera de Informe Médico']);

    }

    //nueva Nota

    public function postNuevaNota( Request  $request, InsolFunction $insolFunction)
    {
        $id = $request->casos_id ;
        $msg =  $request->msg;


        $insolFunction->postNotas($id, $msg);

        return redirect()->back()->with(['msg_success'=>'Nota agregada correctamente.']);
    }


    //cerrar caso
    public function cerrarCaso(Route $route, InsolFunction $insolFunction)
    {
        $id = $route->getParameter('id');
        $insolFunction->postCasosCerrar($id);

        $model = $this->casosRepo->find($id);
        $model->estado_nombre = 'Finalizado';
        $model->save();

        //estado 3 = anulado
        $this->casosRepo->actualizaMovimientos($id, 3);
        return redirect()->route('casos.index')->with(['msg_success'=>'Caso cerrado correctamente.']);


    }

    public function verDocumento($id){
      
        //$d   = Documentos::find($id);
        
        //$pdf   = PDF::loadView(public_path().'/file/prueba');
        return PDF::loadFile(public_path().'\file\prueba.pdf');
    

    }

    public function documentoDownload($id, $fileName ){

        $insolFunction = new InsolFunction();

        $insolFunction->getFile($id);
        $file = $insolFunction->getResultado()->result;


        //return response($file, 200)->header('Content-Type', $file->file_type);
        return response()->file(base64_decode($file->file), $fileName,  $file->file_type);



    }

    public function facturacion($id, Route $route){

        $data['caso'] = $this->casosRepo->find($route->getParameter('id'));
        return view('casos.facturacion')->with($data);
    }

    public function voucher($id,PDF $PDF){
        $caso = $this->casosRepo->find($id);

        $pdf = $PDF->loadView('casos.voucher', compact('caso'));

        return $pdf->stream();
    }

    public function numeroExpediente(Request $request){

         $this->validate($request, ['numero_expediente' => 'required', 'numero_expediente.required' => 'El número de expediente no puede estar vacío.']);
         $caso = $this->casosRepo->find($this->casos_id);
         $caso->numero_expediente = $request->get('numero_expediente');
         $caso->save();

         return redirect()->back()->with(['msg_success'=>'Número de Expediente creado correctamente.']);
    }

    public function casosFinalizados(Request $request){
        
        $limit  = 25;
        $search =  $request->search;

        if($request->has('search'))
            $casos = $this->casosRepo->search($limit, $request->search);
        else
            $casos = $this->casosRepo->listadoFinalizados($limit);

        return view('casos.finalizados',compact('casos','search'));
    }    

    public function anularCaso(Route $route, InsolFunction $insolFunction){
        
        $casosId = $route->getParameter('id');
        $caso    = $this->casosRepo->find($casosId);

        $insolFunction->patchCasos($casosId, 'Anulado');

        $model = $this->casosRepo->find($casosId);
        $model->estado_nombre = 'Anulado';
       
        $model->save();
        //estado 4 = anulado
        $this->casosRepo->actualizaMovimientos($casosId, 4);

        return redirect()->route('casos.index')->with(['msg_danger'=>'Caso anulado correctamente.']);
    }

    public function personas(Route $route){

        $personas = PersonasFisicas::find($route->getParameter('id'));

        $casos = Casos::whereHas('PersonasFisicas', function ($query) use ($personas) {
            $query->where('documento', '=', $personas->documento);
        })
        ->orderBy('id','desc')
        ->get();

     
        return view('casos.historial',compact('casos'));
    }


}
