<?php
namespace App\Http\Controllers;


use App\Http\Repositories\EspecialidadesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\PersonasFisicasRepo as Repo;
use App\Http\Repositories\UserRepo;
use App\Http\Repositories\FichasPersonasFisicasRepo;
use App\Http\Repositories\HogarRepo;
use App\Http\Repositories\CasosRepo;
use App\Http\Repositories\PrestacionesRepo;
use App\Http\Repositories\CuentaCorrienteRepo;
use App\Http\Repositories\MandatariosRepo;
use App\Http\Functions\SintysFunction;
use Validator;
use Auth;
use Carbon;

class PersonasController extends Controller
{
    protected $route;
    protected $especialidadesRepo;
    protected $usersRepo;
    protected $validaciones;
    protected $cuentaCorrienteRepo;
    protected $mandatariosRepo;

    public function __construct( Route $route , Repo $repo, UserRepo $usersRepo, Request $request, CuentaCorrienteRepo $cuentaCorrienteRepo, MandatariosRepo $mandatariosRepo)
    {
        $this->route                = $route;
        $this->data['seccion']      = 'Personas';
        $this->index                = 'personas.index';
        $this->form                 = 'personas.form';
        $this->repo                 = $repo;
        $this->request              = $request;
        $this->cuentaCorrienteRepo  = $cuentaCorrienteRepo;
        $this->mandatariosRepo      = $mandatariosRepo;
        $this->validaciones         = $this->validaciones();
        $this->mensajes             = $this->mensajes();
    }


//    public function getIndex()
//    {
//        $this->data['model']             = $this->repo->all();
//        return parent::getIndex();
//    }
//
//
//    public function getDetalle()
//    {
//
//        $id = $this->route->getParameter('id');
//
//        $this->data['models'] = $this->repo->find($id);
//
//        return view()->make('medicos.detalle')->with($this->data);
//    }



    public function postBuscar(SintysFunction $sintysFunction, Request $request)
    {
   
        //Busqueda Sistema Dadse
        $search = $this->request->search;
        
        $this->data['models']  =  $this->repo->getModel()
            ->where('documento','like','%'.$search.'%')
            ->orWhere('fullname','like','%'.$search.'%')
            ->orWhere('cuil','like','%'.$search.'%')
            ->get();

        // Búsqueda en fuentes externas
        if(count($this->data['models']) == 0){
            //Busqueda SintysFunction
            $this->data['sintys'] = [];
            $fullname  = $request->tipo === 'fullname' ? $request->search : '' ;
            $documento = $request->tipo === 'documento' ? $request->search : '' ;
            $cuil      = $request->tipo === 'dni' ? $request->search : '' ;
            
            $sintysFunction->buscarPersona(
                $fullname,
                $documento,
                $cuil
            );

            if ($sintysFunction->getHttpCode() == 200) {
                    $personas = $sintysFunction->getResultado()->results;

                    foreach ($personas as $persona) {
                        //$fechaNacimiento = Carbon::parse($persona->fechaNacimiento);
                        array_push($this->data['sintys'], [
                            'id' => 0,
                            'fuente' => 'sintys',
                            'legajo' => $persona->sintysId,
                            'full_legajo' => 'SINTYS#' . $persona->sintysId,
                            'fullname' => ucwords(strtolower($persona->fullname)),
                            'documento' => $persona->numeroDocumento,
                            'cuil' => $persona->cuil,
                            //'fecha_nacimiento' => $fechaNacimiento->format('d-m-Y'),
                            //'edad' => $fechaNacimiento->age,
                            'imagen' => asset('img/no-photo.gif'),
                            'provincia' => $persona->provincia,
                            'genero' => $persona->genero,
                            'fallecido' => $persona->fallecido,
                            'tipo_documento' => $persona->tipoDocumento
                    ]);
                }
            }

            
        }

        return $this->getIndex();
    }
    
    //listado de fichas sociales 

    public function getHistoriaFicha(Route $route){
        
        $models = $this->repo->find($this->route->getParameter('id'));

        return view('personas.historia_ficha',compact('models'));
    }

    public function getEditFicha(Route $route, FichasPersonasFisicasRepo $fichasPersonasFisicasRepo){
        
        $models  = $fichasPersonasFisicasRepo->find($route->getParameter('id'));
        //$models = $this->repo->find($this->route->getParameter('id'));
            

        return view('personas.editFicha',compact('models'));
    }

    public function nuevaFicha(Route $route){

        $models = $this->repo->find($this->route->getParameter('id'));
        return view('personas.nuevaFicha',compact('models'));
    }

    public function postFicha(Request $request, FichasPersonasFisicasRepo $fichasPersonasFisicasRepo){
        
        $models = $this->repo->find($request->get('personas_id'));
        $data = $request->only('vivienda','salud','situacion_laboral','conclusiones', 'personas_fisicas_id', 'user_id');
        $data['user_id'] = Auth::user()->id;
        $data['personas_fisicas_id'] = $request->get('personas_id');
        $fichasPersonasFisicasRepo->create($data);
        
        return redirect()->route('personas.historia_ficha',$models->id)->with(['msg_success'=>'Ficha Evaluación Social creada correctamente.']);

    }

    public function editFicha(Request $request, FichasPersonasFisicasRepo $fichasPersonasFisicasRepo){

        $models = $fichasPersonasFisicasRepo->find($request->get('fichas_id'));

        $data = $request->only('vivienda','salud','situacion_laboral','conclusiones', 'user_id');
       
        $data['user_id'] = Auth::user()->id;
        $models->fill($data);
        $models->save();

        return redirect()->route('personas.historia_ficha',$models->PersonasFisicas->id)->with(['msg_success'=>'Ficha Evaluación Social editada correctamente.']);

    }

    
    /*
    Legajo y nuevo caso
    */

    public function getLegajo(Request $request, Route $route){

        $models             = $this->repo->find($route->getParameter('id'));
        $disponibleMensual  = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $models->DisponibleMensual;
        $nacionalidad       = config('custom.nacionalidad');
        $sexo               = config('custom.sexo');
        $estadoCivil        = config('custom.estado_civil');
        $tipoDocumento      = config('custom.tipo_documento');


        return view('personas.legajo',compact('models', 'disponibleMensual','sexo','nacionalidad','estadoCivil', 'tipoDocumento'));

    }

    public function createLegajo(Request $request, Route $route){
       
        $documento = $route->getParameter('documento');
        $fullname  = $route->getParameter('fullname');

        $nacionalidad       = config('custom.nacionalidad');
        $sexo               = config('custom.sexo');
        $estadoCivil        = config('custom.estado_civil');
        $tipoDocumento      = config('custom.tipo_documento');
        $valorMensual       = $this->cuentaCorrienteRepo->getModel()->first()->valor;
       
        return view('personas.legajo',compact('nacionalidad','sexo','estadoCivil', 'valorMensual', 'tipoDocumento', 'documento', 'fullname'));
    }

    public function postLegajo(Request $request, HogarRepo $hogarRepo, CasosRepo $casosRepo, PrestacionesRepo $prestacionesRepo){
        

        $legajo         = $request->only('fullname', 'fecha_nacimiento', 'tipo_documento', 'documento', 'cuil', 'sexo', 'nacionalidad', 'estado_civil', 'email', 'telefono_particular', 'telefono_movil'); 
        $hogar          = $request->only('domicilio', 'provincia', 'municipio', 'localidad');
        $mandatarios    = $request->get('data');
       

        // Edito persona
        if($request->personas_id){

            //datos personales - legajo
            $persona = $this->repo->find($request->get('personas_id'));
            $this->validate($request, ['fullname' => 'required','documento'=>'required|unique:personas_fisicas,documento,'.$persona->id]);
            $persona->fill($legajo);
            $persona->save();

            
            //datos hogar
            if($persona->Hogar){
                $persona->Hogar->fill($hogar);
                $persona->Hogar->save();
            }
            else{
                $hogarModel        = $hogarRepo->create($hogar);
                $persona->hogar_id = $hogarModel->id;
                $persona->save();
            }    

        // creo persona
        }else{

            $this->validate($request, ['fullname' => 'required','documento'=>'required|unique:personas_fisicas,documento']);
            $persona           = $this->repo->create($legajo);
            $hogarModel        = $hogarRepo->create($hogar);
            $persona->hogar_id = $hogarModel->id;
            $persona->save();

        }



        
        /*
        Creo caso
        */
        if ($request->get('tipo_tramite')) {
           
            // valida total cta cte
            
            /*
            $valorMensual       = $this->cuentaCorrienteRepo->getModel()->first()->valor;
            $disponibleMensual  = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $persona->DisponibleMensual;
         
            if($disponibleMensual < $valorMensual )
                return redirect()->back()->with('msg_danger', 'El Importe total autorizado , supera su limite máximo mensual.')->withInput();
            */    
        
            $caso['user_id']                = Auth::user()->id;
            $caso['user_full_name']         = Auth::user()->fullname;
            $caso['user_user_name']         = Auth::user()->username;
            $caso['estado_id']              = 1;
            $caso['ayuda_directa']          = $request->get('tipo_tramite') === "dadse.ayuda.directa" ? "1" : "0";
            $caso['alto_costo']             = $request->get('tipo_tramite') === "dadse.alto.costo" ? "1" : "0";
            $caso['destinatario_type']      = 'persona';
            $caso['estado_nombre']          = 'Iniciado';
            $caso['personas_fisicas_id']    = $persona->id;
            $casoNuevo                      = $casosRepo->create($caso);

            /*
            Prestacion por defecto
            */
            $prestacion['casos_id']         = $casoNuevo->id;
            $prestacion['descripcion']      = 'Medicamentos según recetas adjuntas';
            $prestacion['cantidad']         = 1;
            $prestacion['unidad_medida']    = 'Unidad';
            $prestacion['estado']           = $request->get('tipo_tramite') === "dadse.ayuda.directa" ? "4" : "5"; 
            $prestacionesRepo->create($prestacion);

            /*
            Mandatario 
            */

            if(!is_null($mandatarios)){
                for($i = 0; $i < count($mandatarios); $i++) {
                    if(isset($mandatarios['seleccionar'][$i])){
                
                    $mandatario['fullname']       = $mandatarios['nombre'][$i];
                    $mandatario['documento']      = $mandatarios['documento'][$i];
                    //$mandatario['cuil']         = $mandatarios['cuil'][$i];
                    $mandatario['genero']         = $mandatarios['genero'][$i];
                    $mandatario['tipo_documento'] = $mandatarios['tipo_documento'][$i];
                    $mandatario['casos_id']       = $casoNuevo->id;

                    $this->mandatariosRepo->create($mandatario);
                    }
                }    
            }
            
        }




//        return redirect()->route('personas.index')->with(['msg_success'=>'Datos ingresados correctamente']);

        return redirect()->back()->with(['msg_success'=>'Datos ingresados correctamente']);


    }
    
    public function validaciones(){

        return [ 

            'dni'             => 'required|unique:medicos,dni,'.$this->route->getParameter('id'),
            'nombre'          => 'required',
            'apellido'        => 'required',
            'tipo_matricula'  => 'required',
            'matricula'       => 'required|unique:medicos,matricula,'.$this->route->getParameter('id'), 
        ];
    }


    public function mensajes(){
       
        return [
            'dni.required'            => 'El campo :attribute es requirido.',
            'nombre.required'         => 'El campo :attribute es requirido.',
            'apellido.required'       => 'El campo :attribute es requirido.',
            'tipo_matricula.required' => 'El campo :attribute es requirido.',
            'matricula.required'      => 'El campo :attribute es requirido.',
            'matricula.unique'        => 'El número de matricula ya está en uso.',
            'dni.unique'             => 'El número de dni ya está en uso.'
        ];

    }
    
    // Busqueda de mandatario
    public function getRenaper(Request $request, SintysFunction $sintysFunction)
    {

        //$casosApi->tipo->slug === "dadse.ayuda.directa" ? "1" : "0";
        
        $payload['results'] = [];
        $fullname  = $request->get('tipo') === 'fullname' ? $request->get('valor') : '' ;
        $documento = $request->get('tipo') === 'documento' ? $request->get('valor') : '' ;
        $cuil      = $request->get('tipo') === 'dni' ? $request->get('valor') : '' ;
        // Búsqueda en fuentes externas
        $sintysFunction->buscarPersona(
            $fullname,
            $documento,
            $cuil
        );

        if ($sintysFunction->getHttpCode() == 200) {
            $personas = $sintysFunction->getResultado()->results;

            foreach ($personas as $persona) {
                //$fechaNacimiento = Carbon::parse($persona->fechaNacimiento);
                array_push($payload['results'], [
                    'id' => 0,
                    'fuente' => 'sintys',
                    'legajo' => $persona->sintysId,
                    'full_legajo' => 'SINTYS#' . $persona->sintysId,
                    'fullname' => ucwords(strtolower($persona->fullname)),
                    'documento' => $persona->numeroDocumento,
                    'cuil' => $persona->cuil,
                    //'fecha_nacimiento' => $fechaNacimiento->format('d-m-Y'),
                    //'edad' => $fechaNacimiento->age,
                    'imagen' => asset('img/no-photo.gif'),
                    'provincia' => $persona->provincia,
                    'genero' => $persona->genero,
                    'fallecido' => $persona->fallecido,
                    'tipo_documento' => $persona->tipoDocumento
                ]);
            }
        }
        dd($payload);
        return response()->json($payload, 200);
    }


   
}
