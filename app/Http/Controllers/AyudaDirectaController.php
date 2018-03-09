<?php
namespace App\Http\Controllers;

use App\Entities\Casos;
use App\Http\Functions\InsolFunction;
use App\Http\Functions\NumberToLetterConverter;
use App\Http\Repositories\CasosRepo;
use App\Http\Repositories\PrestacionesRepo;
use App\Http\Repositories\CuentaCorrienteRepo;
use App\Http\Repositories\HospitalesRepo;
use App\Http\Repositories\SolicitudesInformesRepo;
use App\Http\Repositories\ProveedoresRepo;
use App\Http\Repositories\AyudaDirectaRepo as Repo;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Entities\AyudaDirecta;
use App\Entities\Prestaciones;
use App\Entities\User;
use Illuminate\Support\Facades\Auth;
use PDF;



class AyudaDirectaController extends Controller
{
    protected $route;
    protected $casosRepo;
    protected $prestacionesRepo;
    protected $solicitudesInformesRepo;
    protected $cuentaCorrienteRepo;
    protected $hospitalesRepo;
    protected $insolFunction;
    protected $number;
   

    public function __construct(Route $route , Repo $repo, CasosRepo $casosRepo , PrestacionesRepo $prestacionesRepo,
                                SolicitudesInformesRepo $solicitudesInformesRepo, CuentaCorrienteRepo $cuentaCorrienteRepo, 
                                HospitalesRepo $hospitalesRepo, NumberToLetterConverter $number, ProveedoresRepo $proveedoresRepo, InsolFunction $insolFunction)
    {
        $this->route                    = $route;
        $this->casosRepo                = $casosRepo;
        $this->prestacionesRepo         = $prestacionesRepo;   
        $this->solicitudesInformesRepo  = $solicitudesInformesRepo; 
        $this->cuentaCorrienteRepo      = $cuentaCorrienteRepo;
        $this->hospitalesRepo           = $hospitalesRepo;
        $this->insolFunction            = $insolFunction;
        $this->number                   = $number;
        $this->data['proveedores']      = $proveedoresRepo->ayuda();
        $this->data['tipos_de_matriculas'] = config('custom.tipo_matriculas');
        $this->data['seccion']          = 'Ayuda Directa';
        $this->index                    = 'ayuda_directa.index';
        $this->form                     = 'ayuda_directa.form';
        $this->repo                     =  $repo;

        $this->validaciones             =  $this->validaciones();
        $this->mensajes                 =  $this->mensajes();
        $this->casos_id                 =  session('casos_id');
            
        
    }


    public function getNew()
    {   

        if($this->route->getParameter('edit'))
        {
            $this->data['prestacion_solicitud'] = $this->repo->find($this->route->getParameter('id'));
            $this->data['importe_autorizado']   = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $this->casosRepo->find($this->casos_id)->PersonasFisicas->getEditDisponibleMensualAttribute($this->route->getParameter('id'));
        }else{
            $this->data['importe_autorizado']  = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $this->casosRepo->find($this->casos_id)->PersonasFisicas->DisponibleMensual;
        }

        if(is_null($this->cuentaCorrienteRepo->all()->first()))
        {
            return redirect()->back()->with('msg_danger', 'La cuenta corriente esta vacía.');
        }
        
        

        //$this->data['prestacion']           = $this->prestacionesRepo->find($this->route->getParameter('id'));
        $this->data['models']               = $this->casosRepo->find($this->casos_id);
        $this->data['hospitales']           = $this->hospitalesRepo->all()->lists('full_name','id');
        $this->data['cuenta_corriente']     = $this->cuentaCorrienteRepo->all()->first()->valor;
       

        /*
        $dia_hoy                   = date("j");
        $cuenta                    = $this->cuentaCorrienteRepo->all()->first();
        $dia_fin                   = $cuenta->dia_fin_mes;    
        $maximo = $this->cuentaCorrienteRepo->all()->first()->valor;
        
        if($dia_hoy <= $dia_fin){
            if(count($this->data['models']->AyudaDirecta()->whereDay('created_at', '<=', $dia_fin)->get()) > 0)
            {
                if($this->route->getParameter('edit')){
        $suma_monto = $this->data['models']->AyudaDirecta()->whereDay('created_at', '<=', $dia_fin)->where('id','!=', $this->route->getParameter('id'))->sum('importe_autorizado');
                    }else{
            $suma_monto = $this->data['models']->AyudaDirecta()->whereDay('created_at', '<=', $dia_fin)->sum('importe_autorizado');
                    }    
           
            $this->data['monto_disponible']         = ($maximo - $suma_monto);
            
            }else{

                $this->data['monto_disponible']     = $maximo;
                
            }
        }

        if($dia_hoy > $dia_fin){
            
            if(count($this->data['models']->AyudaDirecta()->whereDay('created_at', '>', $dia_fin)->get()) > 0)
            {
            if($this->route->getParameter('edit')){
               $suma_monto = $this->data['models']->AyudaDirecta()->whereDay('created_at', '>', $dia_fin)->where('id','!=',$this->route->getParameter('id'))->sum('importe_autorizado');
             
            }else{
              $suma_monto = $this->data['models']->AyudaDirecta()->whereDay('created_at', '>', $dia_fin)->sum('importe_autorizado');
              
            }    
            $this->data['monto_disponible']         = ($maximo - $suma_monto);
           
            }else{

                $this->data['monto_disponible']     = $maximo;
            }

        }
        
        */
        return parent::getNew();
    }

    /*
    public function getNew()
    {
        if(is_null($this->cuentaCorrienteRepo->all()->first())){
            return redirect()->back()->with('msg_danger', 'La cuenta corriente esta vacía.');
        }

        //$this->data['prestacion']           = $this->prestacionesRepo->find($this->route->getParameter('id'));
        $this->data['models']               = $this->casosRepo->find($this->casos_id);
        $this->data['hospitales']           = $this->hospitalesRepo->all()->lists('full_name','id');
        $this->data['cuenta_corriente']     = $this->cuentaCorrienteRepo->all()->first()->valor;
        

        $dia_hoy                   = date("j");
        $cuenta                    = $this->cuentaCorrienteRepo->all()->first();
        $dia_fin                   = $cuenta->dia_fin_mes;    
        $maximo = $this->cuentaCorrienteRepo->all()->first()->valor;

        $suma_monto = $this->data['models']->AyudaDirecta()->sum('importe_autorizado');
        $this->data['monto_disponible']         = ($maximo - $suma_monto);
        
        
        return parent::getNew();
    }

    public function getIndex(){
        
        return redirect()->back();
    }
    */    



    public function postCreate(Request $request)
    {

        //Valida si la cuenta corriente esta vacia
        if(is_null($this->cuentaCorrienteRepo->all()->first())){
            return redirect()->back()->with('msg_danger', 'La cuenta corriente esta vacía.');
        }
        
        $caso = Casos::find($this->casos_id);

        if(count($caso->prestaciones()->where('estado','=',4)->get()) == 0)
            return redirect()->route('casos.show',$this->casos_id)->with(['msg_danger'=>'No hay prestaciones para crear la AUTORIZACIÓN.']);
        
        // valida total cta cte
        $p = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $this->casosRepo->find($this->casos_id)->PersonasFisicas->DisponibleMensual;

        if( $request->importe_autorizado > $p )
            return redirect()->back()->with('msg_danger', 'El Importe total autorizado , supera su limite máximo mensual.')->withInput();
        

        //Valido y creo ayuda directa
        $this->validate($request, $this->validaciones, $this->mensajes);
        $this->repo->create($request->all());
        $ayuda = $this->repo->ultimo();

        if(count($request->get('proveedores')) > 0) {
            $ayuda->AyudaDirectaProveedores()->sync($request->get('proveedores'));
        }

       
        $prestacion_solicitud   = $this->repo->find($ayuda->id)->Prestaciones()->first()->id;

        // Log
        $this->insolFunction->postLog($caso->id, Auth::user()->username, 'Autorización de Ayuda Directa', 'caso.entrega', 'entrega', true, 'ha generado la autorización de la Ayuda Directa.', '');

        // Finalizo trámite en Insol
        // TODO: Esto debería ser cuando se entrega la autorización.
        $this->insolFunction->patchCasos($caso->id, 'finalizado');

        return redirect()->back()->with(['msg_success'=>'Ayuda directa creada con éxito', 'prestacion_solicitud' => $prestacion_solicitud])->withInput();

    }

    public function postUpdate(Request $request){

        $this->validate($request, $this->validaciones, $this->mensajes);
        $p = $this->cuentaCorrienteRepo->getModel()->first()->valor  - $this->casosRepo->find($this->casos_id)->PersonasFisicas->getEditDisponibleMensualAttribute($request->get('ayuda_id'));

        if( $request->importe_autorizado > $p )
            return redirect()->back()->with('msg_danger', 'El Importe total autorizado , supera su limite máximo mensual.')->withInput();

        
        $ayuda = $this->repo->find($request->get('ayuda_id'));
        $data  = $request->all();
        $repo  = $this->repo->edit($ayuda, $data);

        if(count($request->get('proveedores')) > 0) {
            $ayuda->AyudaDirectaProveedores()->sync($request->get('proveedores'));
        }

        $prestacion = Prestaciones::where('ayuda_directa_id', $repo->id)->first();
        $destinatario = $prestacion->Casos->PersonasFisicas->insol_info;

        if (is_null($destinatario))
            abort(404);
     
        //Datos del pdf
        $data['number']         = $this->number;
        $data['prestacion']     = $prestacion;
        $data['mandatarios']    = $this->casosRepo->getMandatariosFromApi($this->casos_id);
        $data['solicitante']    = $this->casosRepo->getMandatariosFromApi($this->casos_id)->solicitante;
        $data['destinatario']   = $destinatario;
        //$data['proveedores']    = $request->get('proveedores');
     
        $english_format_number  = number_format($repo->importe_autorizado, 2, ',','');
        $data['total']          = $data['number']->to_word($english_format_number,null,'decimal');


       // return redirect()->route('casos.show',$this->casos_id)->with(['msg_success'=>'Ayuda directa creada con éxito', 'ayuda_directa_edit'=>$repo->id]);

        return redirect()->back()->with(['msg_success'=>'Ayuda directa creada con éxito']);
    }



    public function delete($id){

          $ayuda = $this->repo->find($id);
          foreach ($ayuda->Prestaciones as $prestacion) {
              # code...
            $prestacion->estado = 4;
            $prestacion->save();
          }
          $ayuda->AyudaDirectaProveedores()->detach();
          $ayuda->PrestacionesInformes()->delete();
          $ayuda->delete();

          return redirect()->back()->with(['msg_danger'=>'Ayuda directa borrada Correctamente.']);
    }

    public function consultar_importe(Request $request){
        //Datos cuenta corriente
        /*    
        if(is_null($this->cuentaCorrienteRepo->all()->first()))
        {
            $data       = ['estado' => 'error_fecha'];
            return response()->json($data, 200); 
        }
        
        $dia_hoy                   = date("j");
        $cuenta                    = $this->cuentaCorrienteRepo->all()->first();
        $dia_fin                   = $cuenta->dia_fin_mes;
        

        if($dia_hoy > $dia_fin)
        {
            $data       = ['estado' => 'error_fecha'];
            return response()->json($data, 200); 
        }        
    
        $importe_autorizado        = $request->valor;
        $total_ayuda_directa       = $this->repo->sumarMonto($request->casos_id);
        $monto_maximo              = $cuenta->valor;
     
        if($importe_autorizado > $monto_maximo){
            $data       = ['estado' => 'error', 'disponible' => $monto_maximo ];
            return response()->json($data, 200); 
        }

        if(count($total_ayuda_directa) > 0){
          
            //Si ya hay importes cargados calculo que no se pase del maximo
            $total      = $total_ayuda_directa[0]->total + $importe_autorizado;
            $disponible = $monto_maximo - $total_ayuda_directa[0]->total;
            $data       = ['estado' => 'error', 'disponible' => $disponible ];
            
            if($total > $monto_maximo){
                return response()->json($data, 200); 
            } 
        }
    
        
        return response()->json('ok', 200);
        */
         
    }
    public function lastPdf(){

        session()->forget('ayuda_directa');
        $ayuda = $this->repo->ultimo();
        $prestacion = Prestaciones::where('ayuda_directa_id', $ayuda->id)->first();
        $destinatario = $prestacion->Casos->PersonasFisicas->insol_info;

        if (is_null($destinatario))
            abort(404);

        //Datos del pdf
        $data['number']         = $this->number;
        $data['prestacion']     = $prestacion;
        $data['mandatarios']    = $this->casosRepo->getMandatariosFromApi($this->casos_id);
        $data['solicitante']    = $this->casosRepo->getMandatariosFromApi($this->casos_id)->solicitante;
        $data['destinatario']   = $destinatario;
    
 
        $english_format_number  = number_format($ayuda->importe_autorizado, 2, ',','');
        $data['total']          = $data['number']->to_word($english_format_number,null,'decimal');
        $pdf = PDF::loadView('ayuda_directa.pdf', $data);
        
        return $pdf->stream();
    }

    public function EditPdf(Route $route, NumberToLetterConverter $numberToLetterConverter){

        $ayuda_id = $this->route->getParameter('id');
        $ayuda    = $this->repo->find($ayuda_id);
        $prestacion = Prestaciones::where('ayuda_directa_id', $ayuda->id)->first();
        $destinatario = $prestacion->Casos->PersonasFisicas->insol_info;

        if (is_null($destinatario))
            abort(404);

        $data['number']         = $this->number;
        $data['prestacion']     = $prestacion;
        $data['mandatarios']    = $this->casosRepo->getMandatariosFromApi($this->casos_id);
        $data['solicitante']    = $this->casosRepo->getMandatariosFromApi($this->casos_id)->solicitante;
        $data['destinatario']   = $destinatario;
 
 
        $english_format_number  = number_format($ayuda->importe_autorizado, 2, ',','');
        $data['total']          = $data['number']->to_word($english_format_number,null,'decimal');
        $pdf = PDF::loadView('ayuda_directa.pdf', $data);
        
        return $pdf->stream();
    }   


    public function getPdf(Route $route, NumberToLetterConverter $numberToLetterConverter, CasosRepo $casosRepo)
    {
        $prestacion = $this->prestacionesRepo->find($this->route->getParameter('id'));

        $destinatario = $prestacion->Casos->PersonasFisicas;

        if (is_null($destinatario))
            abort(404);

        $data['number']         = new $numberToLetterConverter();
        $data['prestacion']     = $prestacion;
        //$data['mandatarios']    = $casosRepo->getMandatariosFromApi($data['prestacion']->casos_id);
        
        //$data['solicitante']    = $casosRepo->getMandatariosFromApi($data['prestacion']->casos_id)->solicitante;
        $data['destinatario']   = $destinatario;
 
        // $data['ayuda']          = AyudaDirecta::where('prestaciones_id', $this->route->getParameter('id'))->first(); 
        $english_format_number  = number_format($data['prestacion']->Ayuda->importe_autorizado, 2, ',','');
        //$english_format_number  = '152,00';
        $data['total']          = $data['number']->to_word($english_format_number,null,'decimal');

        $pdf = PDF::loadView('ayuda_directa.pdf', $data);
        
        return $pdf->stream();
    } 

//
//    public function getDisponible($casos_id = null)
//    {
//        $month = date('m');
//        $year = date('Y');
//
//        $personaFisicaId = $this->casosRepo->find($casos_id)->PersonasFisicas->id;
//
//        $max = $this->cuentaCorrienteRepo->all()->first()->dia_fin_mes;
//        $monto = $this->cuentaCorrienteRepo->all()->first()->valor;
//
////$aD = AyudaDirecta::where('created_at','>',date($year.'-'.$month.'-9'))
//// ->where('created_at','<=',$year.'-'.$month.'-'.$max)
////->whereHas('casos',function($q) use($personaFisicaId) {
////$q->where('personas_fisicas_id',$personaFisicaId);
////})
////->get();
//
////        $aD = AyudaDirecta::where('created_at','>',')
////            ->whereHas('Casos',function($q) use ($personaFisicaId)
////            {
////                $q->where('personas_fisicas_id',$personaFisicaId);
////            })
////            ->get();
//        $aD = AyudaDirecta::whereBetween('created_at',[ $year.'-'.$month.'-01', $year.'-'.$month.'-'.$max])
//                ->whereHas('Casos',function($q) use ($personaFisicaId)
//                {
//                    $q->where('personas_fisicas_id',$personaFisicaId);
//                })
//                ->get()->SUM('importe_autorizado');
//
//        return $aD - $monto;
//    }
    
    
    public function validaciones(){

         return [

            'cant_recetas'       => 'required|Numeric|regex:/^[0-9]/',
            'cant_medicamentos'  => 'required|Numeric|regex:/^[0-9]/',
            'cant_insumos'       => 'required|Numeric|regex:/^[0-9]/',
            'importe_autorizado' => 'required|Numeric|Min:1',
            'medico_tratante'    => 'required',
            'matricula'          => 'required|Numeric',
            'tipo_matricula'     => 'required' 
            
        ];

    }
    
    public function mensajes(){

        return [
            'cant_recetas.required'       => 'El campo :attribute es requerido.',
            'cant_medicamentos.required'  => 'El campo :attribute es requerido.',
            'cant_insumos.required'       => 'El campo :attribute es requerido.',
            'importe_autorizado.required' => 'El campo :attribute es requerido.',

            'cant_recetas.regex'          => 'El campo :attribute debe ser mayor o igual que 0.',
            //'cant_recetas.min'       => 'El campo :attribute debe ser mayor que 0.',
            'cant_medicamentos.regex'     => 'El campo :attribute debe ser mayor o igual que 0.',
            'cant_insumos.regex'          => 'El campo :attribute debe ser mayor o igual que 0.',
            'importe_autorizado.min'      => 'El campo :attribute debe ser mayor que 0.',

            'cant_recetas.numeric'        => 'El campo :attribute debe ser numérico.',
            'cant_medicamentos.numeric'   => 'El campo :attribute debe ser numérico.',
            'cant_insumos.numeric'        => 'El campo :attribute debe ser numérico.',
            'importe_autorizado.numeric'  => 'El campo :attribute debe ser numérico.',

            'medico_tratante.required'    => 'El campo :attribute es requerido.',
            
            'matricula.required'          => 'El campo :attribute es requerido.',
            'matricula.numeric'           => 'El campo :attribute debe ser numérico.',  
            'tipo_matricula.required'     => 'El campo :attribute es requerido.'

        ];

    }

}