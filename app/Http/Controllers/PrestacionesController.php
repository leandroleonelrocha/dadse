<?php
namespace App\Http\Controllers;

use App\Entities\Prestaciones;
use App\Entities\PrestacionesInformes;
use App\Entities\Presupuestos;
use App\Http\Functions\InsolFunction;
use App\Http\Repositories\AltoCostoMedicosRepo;
use App\Http\Repositories\AltoCostoRepo;
use App\Http\Repositories\MedicosRepo;
use App\Http\Repositories\PrestacionesInformesRepo;
use App\Http\Repositories\PrestacionesReferenciasRepo;
use App\Http\Requests\CreateEvaluacionSocialRequest;
use App\Http\Repositories\PrestacionesRepo as Repo;
use App\Entities\PrestacionesProductos;
use App\Entities\Proveedores;
use App\Http\Functions\KairosFunction;
use App\Http\Functions\ProtesisFunction;
use App\Http\Repositories\PrestacionesProductosReferenciasRepo;
use App\Http\Repositories\PresupuestosAdelantosRepo;
use App\Http\Repositories\PresupuestosRepo;
use App\Http\Repositories\EvaluacionSocialRepo;
use App\Http\Repositories\ProveedoresRepo;
use App\Http\Repositories\ProveedoresTiposRepo;
use App\Http\Repositories\SolicitudRepo;
use App\Http\Repositories\ProtesisRepo;
use App\Http\Repositories\HospitalesRepo;
use App\Http\Repositories\PrestacionesPedidosRepo;
use App\Http\Repositories\CompulsasRepo;
use Barryvdh\DomPDF\PDF;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Functions\NumberToLetterConverter;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateInformeRequest;

class PrestacionesController extends Controller
{
    protected $index;
    protected $form;
    protected $data;
    protected $repo;
    protected $entity;
    protected $kairosFunction;
    protected $protesisFunction;
    protected $solicitudRepo;
    protected $protesisRepo;
    protected $presupuestosRepo;
    protected $evaluacionSocialRepo;
    protected $hospitalesRepo;
    protected $insolFunction;
    protected $route;
    protected $prestacionesPedidosRepo;


    public function __construct(Route $route, HospitalesRepo $hospitalesRepo, PresupuestosRepo $presupuestosRepo, ProtesisRepo $protesisRepo, SolicitudRepo $solicitudRepo, KairosFunction $kairosFunction, ProtesisFunction $protesisFunctions, Repo $repo, EvaluacionSocialRepo $evaluacionSocialRepo, InsolFunction $insolFunction, PrestacionesPedidosRepo $prestacionesPedidosRepo)

    {

        $this->presupuestosRepo = $presupuestosRepo;
        $this->kairosFunction = $kairosFunction;
        $this->protesisFunction = $protesisFunctions;
        $this->repo = $repo;
        $this->solicitudRepo = $solicitudRepo;
        $this->protesisRepo = $protesisRepo;
        $this->insolFunction = $insolFunction;
        $this->mensajes = $this->mensajes();
        $this->validaciones = $this->validaciones();
        $this->casos_id = session('casos_id');
        $this->evaluacionSocialRepo = $evaluacionSocialRepo;
        $this->route = $route;
        $this->hospitalesRepo = $hospitalesRepo;
        $this->prestacionesPedidosRepo = $prestacionesPedidosRepo;
        //$this->index = 'solicitudes.index';
        //$this->form  = 'solicitudes.form';

        //$this->data['solicitudes'] = $this->getSolicitudes();

    }

    public function validaciones()
    {
        return [
            'cantidad' => 'required|Integer|Min:1',
            'unidad_medida' => 'required',
            'descripcion' => 'required',
            'importe_asignado' => 'required|Numeric'

        ];
    }

    public function mensajes()
    {
        return [
            'cantidad.required' => 'El campo :attribute es requirido.',
            'unidad_medida.required' => 'El campo :attribute es requirido.',
            'descripcion.required' => 'El campo :attribute es requirido.',
            'importe_asignado.required' => 'El campo :attribute es requirido.',

            'importe_asignado.Numeric' => 'El campo :attribute es numérico.',
            'cantidad.integer' => 'El campo :attribute es numérico.',

            'cantidad.min' => 'El campo :attribute debe ser mayor a 0.',

        ];
    }


    public function getAsignar($idCaso = null, Request $request)
    {

        if ($this->route->getParameter('edit')) {
            $this->data['edit'] = TRUE;
            $this->data['prestaciones_id'] = $this->route->getParameter('idPrestaciones');
            $this->data['model'] = $this->repo->find($this->route->getParameter('idPrestaciones'));
        }

        $this->data['caso_id'] = $this->casos_id;

        //$this->data['producto'] = $solicitudesApiRepo->getPrestaciones($idPrestaciones);
        $this->data['protesis'] = $this->protesisRepo->all();

        $this->data['prestaciones'] = Prestaciones::where('casos_id', $idCaso);
        //$this->data['prestaciones'] = PrestacionesProductos::where('prestaciones_id', $idPrestaciones)->get();

        return view('casos.prestaciones.asignar')->with($this->data);
    }


    public function getAsignarIntervencion($idCaso = null, Request $request){


        $this->data['caso_id'] = $this->casos_id;
        $this->data['tipo_intervencion'] = $this->route->getParameter('tipo');
        //$this->data['producto'] = $solicitudesApiRepo->getPrestaciones($idPrestaciones);
        $this->data['protesis'] = $this->protesisRepo->all();

        $this->data['prestaciones'] = Prestaciones::where('casos_id', $idCaso);
        //$this->data['prestaciones'] = PrestacionesProductos::where('prestaciones_id', $idPrestaciones)->get();

        return view('casos.prestaciones.asignar')->with($this->data);

    }



    // asigna productos a la prestacion
    public function postAsignar(Request $request, PrestacionesReferenciasRepo $prestacionesReferenciasRepo)
    {


        $this->validate($request, $this->validaciones, $this->mensajes);
        $pp = $this->repo->create($request->all());
        if($request->get('tipo_intervencion') == 4){
            $pp->estado = 4;
            $pp->save();
           
        }
        if($request->get('tipo_intervencion') == 5){
            $pp->estado = 5;
            $pp->save();
        }


        $request['prestaciones_id'] = $pp->id;

        $prestacionesReferenciasRepo->create($request->all());

        return redirect()->route('casos.show', $this->casos_id);

    }


    public function postUpdateAsignar(Request $request, PrestacionesReferenciasRepo $prestacionesReferenciasRepo)
    {
       
        $this->validate($request, $this->validaciones, $this->mensajes);

        $pp = $this->repo->find($request['prestaciones_id']);

        $this->repo->edit($pp, $request->all());

        $prestacionesReferenciasRepo->create($request->all());

        return redirect()->route('casos.show', $this->casos_id);

    }


    /*
    public function getAsignarProducto($tipo = null, $idPrestaciones = null, $idProducto = null, $idPresentaciones)
    {

        if ($tipo == 'medicamentos') {

            $this->kairosFunction->searchPresentacionesDetalleKairos($idPresentaciones, $idProducto);
            $presentacion = $this->kairosFunction->getResultado()->result;

            $this->kairosFunction->searchPresentacionesKairos($idProducto);
            $producto = $this->kairosFunction->getResultado()->result;

            $presentacionesProductos = new PrestacionesProductos();
            $presentacionesProductos->productos_id = $idProducto;
            $presentacionesProductos->productos_detalle = $producto->descripcion;
            $presentacionesProductos->prestaciones_id = $idPrestaciones;
            $presentacionesProductos->presentaciones_id = $idPresentaciones;
            $presentacionesProductos->presentaciones_detalle = $presentacion->descripcion;
            $presentacionesProductos->importe = $presentacion->precio;
            $presentacionesProductos->tipos = $tipo;
            $presentacionesProductos->save();

            $this->solicitudRepo->actualizaMovimientos(Session::get('solicitud_id'), 4);

        } else {

            $this->protesisFunction->searchProtesisDetalle($idProducto);
            $producto = $this->protesisFunction->getResultado()->result;

            $presentacionesProductos = new PrestacionesProductos();
            $presentacionesProductos->productos_id = $idProducto;
            $presentacionesProductos->productos_detalle = $producto->nombre;
            $presentacionesProductos->prestaciones_id = $idPresentaciones;
            $presentacionesProductos->presentaciones_id = null;
            $presentacionesProductos->importe = $producto->valor;
            $presentacionesProductos->tipos = $tipo;
            $presentacionesProductos->save();

            $this->solicitudRepo->actualizaMovimientos(Session::get('solicitud_id'), 4);

        }


        //$presentacion  = $this->getProductoPresentacion($idProducto,$idPresentaciones);
        //$producto      = $this->getProducto($idProducto, false);


        return redirect()->back();
    }
    */

    public function getPrestacionesProductosDelete($idPrestacionesProductos = null)
    {

        PrestacionesProductos::find($idPrestacionesProductos)->delete();

        $this->solicitudRepo->actualizaMovimientos(Session::get('solicitud_id'), 5);

        return redirect()->back();
    }


    public function getInformes($idPrestaciones = null, AltoCostoRepo $altoCostoRepo)
    {   

        $prestaciones = explode('/', $this->route->getParameter('idPrestaciones'));
        $this->data['models'] = [];    
        foreach ($prestaciones as $key => $value) {
            # code...
            $prestacion =  $this->repo->find($value);
            array_push($this->data['models'] , $prestacion); 
            
        }
        
        $this->data['producto']     = Prestaciones::find($idPrestaciones);
        $this->data['hospitales']   = $this->hospitalesRepo->all()->lists('full_name', 'id');

        //$this->data['prestaciones'] = PrestacionesProductos::where('prestaciones_id', $idPrestaciones)->get();
        //$this->data['model'] = PrestacionesInformes::where('prestaciones_id', $idPrestaciones)->first();

        //$altoCostoRepo->where('prestaciones_id',$idPrestaciones);

        return view('casos.prestaciones.prestaciones_informes')->with($this->data);
    }

    public function generarPedido(Request $request, Route $route, PrestacionesInformesRepo $prestacionesInformesRepo){
       
        //nuevo pedido de prestacion
        
        $prestacion = $this->repo->find($request->get('prestaciones_id'));
        $pedido['prestaciones_id']     = $request->get('prestaciones_id');
        $pedido['cantidad_solicitada'] = $request->get('cantidad_solicitada');
        
       
        if($request->get('caracter') == 1){
            $pedido['caracter'] = 1;
            $pedido['estado']   = 9;
        }
        else{
            $pedido['caracter'] = 0;
            $pedido['estado']   = 8; 
        }

        $this->prestacionesPedidosRepo->create($pedido); 

        return redirect()->back()->with(['msg_success' => 'Se generó un nuevo pedido de presupuesto.']);
 

    }

    public function postUpdateinformes(Request $request, PrestacionesInformesRepo $prestacionesInformesRepo)
    {   
            /*
            $variables = $request->get('prestaciones_id');
            foreach ($variables as $key => $value) {
              
                $productos = $request->productos_id;
                $urgentes = $request->urgente;
                $data = $request->all();
                $data['medicos_id'] = Auth::user()->Medico->id;
                $data['prestaciones_id'] = $value;
                
                $prestacion = $this->repo->find($value);
                $informe = $prestacionesInformesRepo->edit($prestacion->Informe, $data);
              
            }
            */
            $productos = $request->productos_id;
            $urgentes = $request->urgente;
            $data = $request->all();
            $data['medicos_id'] = Auth::user()->Medico->id;
            $data['prestaciones_id'] = $request->get('prestaciones_id');
            
            $prestacion = $this->repo->find($request->get('prestaciones_id'));
            $informe = $prestacionesInformesRepo->edit($prestacion->Informe, $data);
     
            

            //foreach ($productos as $producto) {

            //$prod = $prestacionesProductosRepo->find($producto);
            //$prod->estado = 1;

            // if (!is_null($urgentes)) {

            //   foreach ($urgentes as $urgente) {
            // if ($urgente == $producto)
            //  $prod->urgente = 1;
            //    }
            // }

            //  $prod->save();
            //}
        return redirect()->back()->with(['msg_success' => 'El informe médico se editó correctamente.']);    
        //return redirect()->route('casos.show', $this->casos_id)->with(['msg_success' => 'El informe médico se editó correctamente.']);
    }

    public function postInformes(CreateInformeRequest $request, PrestacionesInformesRepo $prestacionesInformesRepo)
    {   

        if (is_null(Auth::user()->Medico))
            return redirect()->back()->with(['msg_danger' => 'Para Realizar el Informe Médico , debe tener usuario habilitado.']);
            /*
            $variables = $request->get('prestaciones_id');

            foreach ($variables as $key => $value) {
                database ecommerce
                $productos = $request->productos_id;
                $urgentes = $request->urgente;
                $data = $request->all();
                $data['medicos_id'] = Auth::user()->Medico->id;
                $data['prestaciones_id'] = $value;
                
                $informe = $prestacionesInformesRepo->create($data);

                $prestacion = $this->repo->find($value);

                if (!is_null($urgentes))
                    $prestacion->estado = 9;
                else
                    $prestacion->estado = 8;

                $prestacion->save();
            }
            */

            $productos = $request->productos_id;
            $urgentes = $request->urgente;
            $data = $request->all();
            $data['medicos_id'] = Auth::user()->Medico->id;
            $data['prestaciones_id'] = $request->get('prestaciones_id');
            
            $informe = $prestacionesInformesRepo->create($data);
            $prestacion = $this->repo->find($request->get('prestaciones_id'));

            if (!is_null($urgentes))
                $prestacion->estado = 9;
            else
                $prestacion->estado = 8;

            $prestacion->save();

        


            //foreach ($productos as $producto) {

            //$prod = $prestacionesProductosRepo->find($producto);
            //$prod->estado = 1;

            // if (!is_null($urgentes)) {

            //   foreach ($urgentes as $urgente) {
            // if ($urgente == $producto)
            //  $prod->urgente = 1;
            //    }
            // }

            //  $prod->save();
            //}
        return redirect()->back()->with(['msg_success' => 'El informe médico se editó correctamente.']);
        //return redirect()->route('casos.show', $this->casos_id)->with(['msg_success' => 'Se creó el informe médico correctamente.']);

    }

    public function informe_multiple(Request $request){
        
        dd($this->route->getParameter('data'));
    }

    public function getPresupuestoDetalle($idPrestaciones = null)
    {

        $pP = PrestacionesProductos::find($idPrestaciones);
        $this->data['presupuestos'] = $pP->Presupuestos;

        return view('solicitudes.prestaciones.presupuesto_detalle')->with($this->data);
    }


    //alto costo
    public function altoCosto(MedicosRepo $medicos, \Illuminate\Routing\Route $route)
    {   


        //$prestaciones = explode('/', $this->route->getParameter('idPrestaciones'));
        /*
        $this->data['prestaciones_id'] = [];
        foreach ($prestaciones as $key => $value) {
            # code...
            $prestacion =  $this->repo->find($value);
            array_push($this->data['prestaciones_id'] , $prestacion); 
            
        }
        */
        $this->data['prestaciones_id']  = Prestaciones::find($this->route->getParameter('idPrestaciones'));
        $this->data['casos_id'] = $this->casos_id;
        $this->data['medicos'] = $medicos->all();
        $this->data['prestaciones_id'] = $route->getParameter('idPresentaciones');
        // $this->solicitudRepo->actualizaMovimientos(1,6);

        return view('casos.prestaciones.solicitud_alto_costo')->with($this->data);
    }


    public function postSolicitudPresupuesto(Request $request, CompulsasRepo $compulsasRepo,ProveedoresRepo $proveedoresRepo, PresupuestosRepo $presupuestosRepo, ProveedoresTiposRepo $proveedoresTiposRepo)
    {   
     
        //si existe presupuestos ordinarios, se crea una compulsa
       
        if(isset($request->prestaciones_ordinarios_id[0])){
            $compulsa = $compulsasRepo->create([
                'fecha_solicitud' => date('Y-m-d'),
                'fecha_cierre' => $request->fecha_cierre,   
                'fecha_apertura_sobre' => $request->fecha_apertura_sobre,    
                'estado' => 0
            ]);
        }

        $proveedores = array();
        foreach ($request->tipo as $tipo) {
            $tipo = $proveedoresTiposRepo->find($tipo);
            foreach($tipo->Proveedores as $p) {
               if(!in_array($p->id, $proveedores)){
                    array_push($proveedores, $p->id);
               }
            }
        }


        //prestaciones urgentes = Caracter 1
        foreach ($proveedores as $proveedor) {


            if(isset($request->prestaciones_urgentes_id)) {
                foreach($request->prestaciones_urgentes_id as $key => $prod) {
                    //id pedido

                    $pedido_id = $request->prestaciones_pedidos_urgentes_id[$key];
                    $pedido = $this->prestacionesPedidosRepo->find($pedido_id);    
                  
                    $presu = $presupuestosRepo->create(['caracter' => '1',
                        'prestaciones_id' => $prod,
                        'fecha_solicitud' => date('Y-m-d'),
                        'estado' => '7',
                        'users_id' => Auth::user()->id,
                        'proveedores_id' => $proveedor,
                        'fecha_cierre' => $request->fecha_cierre,
                        'fecha_apertura_sobre' => $request->fecha_apertura_sobre,
                        'compulsa_id' => NULL,
                        'prestaciones_pedidos_id' => $pedido_id,
                        ]);
                        //prestacion
                        $prestacion = $this->repo->find($prod);
                        $prestacion->estado = 10;
                        $prestacion->save();
                        $presu->Prestaciones()->attach($prod);
                        //prestacion pedido
                        $pedido->estado = 10;
                        $pedido->save();
                        
                }

            }

       

            //prestaciones ordinarias = Caracter 0
            if (isset($request->prestaciones_ordinarios_id)) {
                foreach($request->prestaciones_ordinarios_id as $key => $prod) {
                    
                    $pedido_id = $request->prestaciones_pedidos_ordinarios_id[$key];
                    $pedido = $this->prestacionesPedidosRepo->find($pedido_id);    
                   
                    $presu = $presupuestosRepo->create(['caracter' => '0', 'prestaciones_id' => $prod,
                        'fecha_solicitud' => date('Y-m-d'),
                        'estado' => '7',
                        'users_id' => Auth::user()->id,
                        'proveedores_id' => $proveedor,
                        'fecha_cierre' => $request->fecha_cierre,
                        'fecha_apertura_sobre' => $request->fecha_apertura_sobre,
                        'compulsa_id' => $compulsa->id,
                        'prestaciones_pedidos_id' => $pedido_id,
                        ]);
                        //prestacion 
                        $prestacion = $this->repo->find($prod);
                        $prestacion->estado = 11;
                        $prestacion->save();
                        $presu->Prestaciones()->attach($prod);

                        //pedido
                        $pedido->estado = 11;
                        $pedido->save();
                }
            }


        }
        //arma  el excel
        if(isset($compulsa))
            $this->buildExcel($compulsa->id);
        else
            $this->buildExcel();


        $this->sendMail();
        
        //$this->casos_id                 =  session('casos_id');
        return redirect()->back()->with(['msg_success' => 'Se envió correctamente el mail a los proveedores, se espera respuesta.']);

    }

    //solicita alto costo a los medicos
    public function solicitarAltoCosto(Request $request, MedicosRepo $medicosRepo, AltoCostoRepo $altoCostoRepo, AltoCostoMedicosRepo $altoCostoMedicosRepo)
    {
        

        $medicos_id   = $request->medicos_id;
        $prestaciones = $request->get('prestaciones_id');
      
            $newAltoCosto = ['prestaciones_id' => $prestaciones, 'estado' => 1, 'fecha' => date('Y-m-d')];
            $altoCosto = $altoCostoRepo->create($newAltoCosto);

             //envia mails a los medicos
            foreach ($medicos_id as $medico) {
                $newAltoCostoMedico = ['alto_costo_id' => $altoCosto->id, 'medicos_id' => $medico, 'fecha_envio' => date('Y-m-d'), 'estado' => 1];
                $altoCostoMedicosRepo->create($newAltoCostoMedico);
            }

            $this->repo->cambiarEstado($prestaciones,2);
            //cambio estado en la prestacion
            //$this->repo->cambiarEstado($request->prestaciones_id, 2);
        
        
        //return redirect()->route()->with(['msg_success'=>'Prestacion enviada y en espera de Iforme Médico.']);
        return redirect()->route('casos.show', $this->casos_id)->with(['msg_success' => 'Prestación enviada y en espera de Informe Médico.']);

    }


    // adelantos
    public function adelantos(Route $route)
    {

        $id = $route->getParameter('idPrestaciones');

        $this->data['model'] = $this->repo->find($id);

        return view('casos.prestaciones.prestaciones_adelantos')->with($this->data);
    }

    public function postAdelantos(Request $request, PresupuestosAdelantosRepo $presupuestosAdelantosRepo, PDF $pdf, \Illuminate\Routing\Route $route)
    {

        $adelanto   = $route->getParameter('adelantos_id');
        $prestacion = $route->getParameter('prestaciones_id');

        $presupuestosAdelantosRepo->create($request->all());
        
        
        return redirect()->back()->with(['msg_success' => 'Adelanto agregado con éxito.']);
     
    }

    public function getAdelantos(Request $request, PresupuestosAdelantosRepo $presupuestosAdelantosRepo, PDF $pdf, \Illuminate\Routing\Route $route)
    {   

        $adelanto = $route->getParameter('adelantos_id');
        $prestacion = $route->getParameter('prestaciones_id');
        
        $data['prestacion'] = $this->repo->find($prestacion);
        $data['adelanto'] = $presupuestosAdelantosRepo->find($adelanto);
        
        $pdf = $pdf->loadView('reportes.autorizacion_de_adelanto', $data);
        return $pdf->setPaper('A4')->stream();
    }

    public function autorizacionAdelantos()
    {

    }


    // facturacion

    public function facturar(Route $route)
    {
        $idPrestaciones = $route->getParameter('idPrestaciones');

        $data['prestacion']  = Prestaciones::find($idPrestaciones);
        $data['proveedores'] = Proveedores::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $data['proveedores']->prepend('Seleccionar Proveedor');
        return view('casos.prestaciones.facturar')->with($data);
    }

    public function asignarFactura(Request $request)
    {

        $prestacion = $this->repo->find($request->prestaciones_id);
        $prestacion->FacturasItems()->attach($request->facturas_items_id);

        return redirect()->back();

    }
    
    public function imprimirPresupuestos($id, PDF $PDF, Prestaciones $prestaciones)
    {
        $prestacion = $prestaciones->find($id);

        $pdf = $PDF->loadView('reportes.presupuestos_proveedores', compact('prestacion'));

        return $pdf->stream();
    }


    // resolucion

    public function asignarResolucion(Route $route)
    {
        $data['model'] = $this->repo->find($route->getParameter('idPrestaciones'));

        return view('casos.prestaciones.asignarResolucion')->with($data);
    }

    public function postAsignarResolucion(Request $request)
    {
        $this->validate($request, ['resolucion' => 'required', 'expediente' => 'required'] , ['resolucion.required'=>'El número de resolución es requerido.', 'expediente.required'=>'El número de expediente es requerido.' ]);

        $data = $this->repo->find($request->prestaciones_id);
        $data->resolucion = $request->resolucion;
        $data->expediente = $request->expediente;
        $data->save();

        return redirect()->route('casos.show', $this->casos_id)->with(['msg_success' => 'Resolución Asignada con éxito .']);
    }

    public function imprimirResolucion(PDF $PDF, Route $route)
    {   
        $prestacionId = $route->getParameter('prestacionesId');

        $data['prestacion'] = Prestaciones::find($prestacionId);
        $number = new NumberToLetterConverter();
        $miMoneda = null;

        //Si la prestacion tiene un presupuesto adjudicado
        $data['total'] = $number->convertNumber($data['prestacion']->PresupuestoAdjudicado->total, $miMoneda, 'decimal');
        $pdf = $PDF->loadView('reportes.resolucion', $data);
        return $pdf->stream();
    }


    public function detalles($id, Prestaciones $prestaciones)
    {
        $model = $prestaciones->find($id);
        return view('casos.prestaciones.prestaciones_detalles', compact('model'));
    }
    
    // excel de envio de mail
    public function buildExcel($compulsa = null)
    {
        ///$pres  = Presupuestos::where('estado', 7)->get();

        $proveedores = Proveedores::whereHas('Presupuestos', function ($q) {
            $q->where('estado', 7);

        })->get();

        foreach ($proveedores as $prov) {

            $data['proveedor'] = $prov;
            if($compulsa != null)
                $fileName = $prov->id.'-'.time().'-COMPULSA-'.$compulsa;
            else
                $fileName = $prov->id.'-'.time().'-URGENTES';

            Excel::create($fileName, function ($excel) use ($data) {
                $excel->setTitle('Presupuestos DADSE #');

                $excel->sheet('Hoja1', function ($sheet) use ($data) {
                    // $sheet->fromArray($prov->Prestaciones);

                    $sheet->loadView('reportes.excel_solicitud_presupuesto')
                        ->with($data);

                });

            })->store('xls', storage_path('Presupuestos/'));


            foreach ($prov->Presupuestos as $presupuesto)
            {
               // $presupuesto = Presupuestos::find($presupuesto->id); 
                if($presupuesto->estado == 7)
                {
                    $presupuesto->estado = 8;
                    $presupuesto->file_name = $fileName . '.xls';
                    $presupuesto->save();
                }
            }
        }
        // $this->sendMail($excel, $proveedor, $proveedor->Presupuestos);

    }


    public function sendMail()
    {

        foreach (\App\Entities\Presupuestos::where('estado', 8)->get()->groupBy('file_name') as $a => $pres )
        {

            $file = storage_path('Presupuestos/') . $a;

            Mail::send('casos.prestaciones.mails.mail_presupuesto_proveedor', [ 'pres'=> $pres], function ($message) use ($pres, $file)
            {
                $message->from(env('MAIL_AYUDA_DIRECTA'));

                $message->to($pres->first()->Proveedores->EmailLists())
                    ->subject('COMPULSA DE MEDICAMENTOS ')
                    ->replyTo(env('MAIL_SECTOR_PRESUPUESTOS'), 'DADSE');

                    if (!is_null($file))
                        $message->attach($file);
            });

                foreach ($pres  as $p)
                {
                    $p->estado = 9;
                    $p->save();
                }
        }

    }

    public function evaluacionSocial($id)
    {

        $model = $this->repo->find($id);

        return view('casos.prestaciones.evaluacion_social', compact('model'));
    }

    public function postEvaluacionSocial(CreateEvaluacionSocialRequest $request)
    {

        $prestacion = $request->get('prestaciones_id');
        $data = $request->all();
        $evaluacion = $this->evaluacionSocialRepo->create($data);

        // Log
        $this->insolFunction->postLog($evaluacion->Prestacion->Casos->id, Auth::user()->username, 'Evaluación Social', 'casos.add.doc', 'documentacion', true, 'ha realizado la evaluación social.', '');

        return redirect()->route('prestaciones.detalles', $prestacion)->with(['msg_success' => 'Evaluación social asignada con éxito .']);
    }


    public function postEditEvaluacionSocial(Request $request)
    {
        $prestacion = $request->get('prestaciones_id');
        $model = $this->evaluacionSocialRepo->find($request->get('evaluacion_id'));
        $this->evaluacionSocialRepo->edit($model, $request->all());
        return redirect()->route('prestaciones.detalles', $prestacion)->with(['msg_success' => 'Evaluación social editada con éxito .']);
    }

    public function imprimirEvaluacionSocial(PDF $PDF, Request $request, Route $route)
    {
        $id = $route->getParameter('id');
        $model = $this->repo->find($id);
        $pdf = $PDF->loadView('reportes.evaluacion_social', compact('model'));
        return $pdf->stream();
    }

    public function getCancelar(Request $request)
    {
        
        $this->validate($request, ['observaciones' => 'required',]);
        $prestacion = $this->repo->find($request->get('prestacion_id'));

        $prestacion->observaciones = $request->get('observaciones');
        $prestacion->estado = 14;
        $prestacion->save();

        return redirect()->back()->with(['msg_danger' => 'Prestación cancelada con éxito.']);
    }

    public function getObservacion(Request $request)
    {
        $prestacion = $this->repo->find($request->get('prestacion_id'));
        return response()->json($prestacion, 200);
    }

    public function getDictamenMedico(PDF $PDF,Request $request, NumberToLetterConverter $numberToLetterConverter, Route $route, PrestacionesInformesRepo $prestacionesInformesRepo, PresupuestosRepo $presupuestosRepo)
    {   
 
        $presupuestos = $presupuestosRepo->find($route->getParameter('idPrestaciones'));
        $prestacion   = $this->repo->find($presupuestos->Pedido->Prestacion->id);
        $informe      = $prestacionesInformesRepo->getModel()->where('prestaciones_id', $prestacion->id)->get()->first();

        $data['number']         = new $numberToLetterConverter();
        $english_format_number  = number_format($presupuestos->total, 2, ',','');
        $total_letras           = $data['number']->to_word($english_format_number,null,'decimal');
        $pdf                    = $PDF->loadView('reportes.dictamen_medico',compact('prestacion','informe','presupuestos','total_letras'));
        
        return $pdf->stream();

    }

}
