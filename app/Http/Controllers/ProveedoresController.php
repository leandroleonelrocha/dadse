<?php
namespace App\Http\Controllers;


use App\Entities\Casos;
use App\Entities\Facturas;
use App\Entities\Liquidaciones;
use App\Entities\Presupuestos;
use App\Entities\PrestacionesFacturasItems;
use App\Entities\Proveedores;
use App\Http\Repositories\CasosRepo;
use App\Http\Repositories\FacturasItemsRepo;
use App\Http\Repositories\FacturasRepo;
use App\Http\Repositories\LiquidacionesRepo;
use App\Http\Repositories\MandatariosRepo;
use App\Http\Repositories\ProveedoresRepo as Repo;
use App\Http\Repositories\ProveedoresTiposRepo;
use App\Http\Repositories\PresupuestosRepo;
use App\Http\Repositories\PrestacionesRepo;
use App\Http\Repositories\AutorizacionDePagosRepo;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Excel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Functions\NumberToLetterConverter;
use App\Http\Requests\CreateFacturaRequest;
use App\Http\Requests\CreateItemsRequest;
use App\Http\Functions\ApiUnidbFunction;
use App\Http\Functions\ProtesisFunction;
use Response;
use Storage;
use Illuminate\Support\Collection as Collection;


class ProveedoresController extends Controller
{
    protected $route;
    protected $request;
    protected $uniDb;
    protected $sedesFunction;


    public function __construct(Route $route, Repo $repo, ProveedoresTiposRepo $tipos, ProtesisFunction $sedesFunction, Request $request, NumberToLetterConverter $number)
    {
        $this->route = $route;
        $this->repo  = $repo;

        $this->data['seccion'] = 'Proveedores';
        $this->index           = 'proveedores.index';
        $this->form            = 'proveedores.form';

        $this->data['tipos']   = $tipos->listsCombo('nombre', 'id');
        $this->data['tipos_proveedores'] = $tipos->all();
        $this->casos_id        = session('casos_id');
        //$this->validaciones = $this->validaciones();
        //$this->mensajes = $this->mensajes();
        
        $this->request = $request;
        $sedesFunction->call(env('API_MDS_URL').'/unidb/sedes/?search='.'&limit=500');
        $this->data['sedes'] = $sedesFunction->getResultado()->results;
        $this->number        = $number;
       
    }

    //---- FACTURACION
    public function lastAutorizacion_pago(Request $request,FacturasRepo $facturasRepo,AutorizacionDePagosRepo $autorizacionDePagosRepo, Route $route){

            //$autorizacion         = $autorizacionDePagosRepo->ultimo();
            //$factura              = $autorizacion->Facturas;
            
            $factura              = $facturasRepo->find($route->getParameter('facturaId'));

            $number               = new NumberToLetterConverter();
            $miMoneda             = null;

            $factura->monto_letra = $number->convertNumber($factura->FacturasItems->sum('precio_unitario'), $miMoneda, 'entero');
            $pdf                  = PDF::loadView('reportes.autorizacionDePago', compact('factura'));

            //$pdf->loadView('proveedores.autorizacionDePago', $id);
            return $pdf->stream();

    }


    public function autorizarPago(Request $request,FacturasRepo $facturasRepo, AutorizacionDePagosRepo $autorizacionDePagosRepo)
    {   

        //$id = $this->route->getParameter('facturaId');
        //$factura = $facturasRepo->find($id);
        $autorizacion         = $autorizacionDePagosRepo->create($request->all());
       // $factura              = $autorizacion->Facturas;
        return redirect()->back()->with(['msg_success'=>'Autorización de pago creada con éxito']);
        /*
        $number               = new NumberToLetterConverter();
        $miMoneda             = null;

        $factura->monto_letra = $number->convertNumber($factura->FacturasItems->sum('precio_unitario'), $miMoneda, 'entero');
        $pdf                  = PDF::loadView('reportes.autorizacionDePago', compact('factura'));

        //$pdf->loadView('proveedores.autorizacionDePago', $id);
        return $pdf->stream();
        */    
    }

    //Excel de facturas en proveedores
    public function subirExcel(Request $request, Excel $excel, FacturasRepo $facturasRepo, FacturasItemsRepo $facturasItemsRepo,
                               PrestacionesFacturasItems $prestacionesFacturasItems, CasosRepo $casosRepo, MandatariosRepo $mandatariosRepo)
    {


        $file = $request->file;

        $results = $excel->load($file, function ($reader) {

            $results = $reader->get();
          
        })->get();

        $req = [];
        $errors = [];
        $data = [];
        $error_caso = [];
        $proveedor = $request->proveedores_id;
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        $grouped = $results->groupBy(function($result)
        {
            if(!empty($result->n_caso) || $result->n_caso !== ' ' )
            {
                return intval($result->n_caso);
            }
        })->toArray();
        


        foreach($grouped as $caso => $items)
        {

            $caso_find   = Casos::find($caso);

            if(!is_null($caso_find))
            {
                $mandatario = $casosRepo->getMandatarios($caso_find->id);
                
                if(!empty($mandatario)){

                    if(!empty($mandatario->mandatarios)){

                        if(is_null($caso_find->Mandatarios)){
                          
                            $dato['fullname'] = $mandatario->mandatarios[0]->fullname;
                            $dato['documento'] = $mandatario->mandatarios[0]->documento;
                            $dato['tipo_documento'] =  $mandatario->mandatarios[0]->tipo_documento->slug;
                            $dato['casos_id'] = $caso_find->id;
                            $mandatariosRepo->create($dato);
                        }
                    }
                }

                $montoMaximo = $casosRepo->find($caso)->getImporteTotalAyudasDirectas();
            }else{
                if($caso !== 0){
                    array_push($error_caso, $caso);
                }
            }

            if(!is_null($caso_find)){

                $sum = 0;   
                foreach($items as $item) {
                     
                        $importe =  $item['importe']; 
                        $sum     += $item['importe'];
                        
                        $req['importe']        = $item['importe'];
                        $req['n_caso']         = intval($item['n_caso']);
                        $req['n_factura']      = $item['n_factura'];
                        $req['n_liquidacion']  = $item['n_liquidacion'];
                        

                        $val = Validator::make($req,
                        [
                            'importe' => ['regex:' . $regex],
                            //'importe'=> 'max:'.$montoMaximo,
                            //'importe' => 'no_html:'.$sum.','.$montoMaximo,
                            //'n_liquidacion'=>'required|exists:prestaciones,id',
                            'n_caso'=>'required|exists:casos,id',
                            'n_factura' =>  'required',
                            'n_liquidacion' => 'required|unique:liquidaciones,nro_liquidacion_proveedor',
                        ],[
                            'importe.regex' => 'El campo :attribute tiene formato inválido',
                            //'n_prestaciones.exists' => 'El campo :attribute no existe',
                            'n_liquidacion.unique' => 'El campo liquidaci&oacuten ya est&aacute en uso.',
                            'n_caso.exists' => 'El campo :attribute no existe',
                            'n_caso.required' => 'El campo :attribute es requirido.',
                            'n_factura.required' => 'El campo :attribute es requirido.',
                        ]);

                        if($val->fails())
                        {
                            $item['error'] =  $val->messages();
                        }

                        if(!empty($montoMaximo)){
                            if($sum > $montoMaximo && !empty($montoMaximo) ){
                                //$item['error_importe'] =  $item['n_caso'].' -' .$montoMaximo . ' - ' . $sum;
                                $item['error_importe'] = 'Ha superado el máximo de Autorización del caso #'.$item['n_caso'].' de : $'.$montoMaximo;
                            }
                        }
                        array_push($data, $item);
                    }

                
                }
                
            }
  

        return view('proveedores.importErrors',compact('data','proveedor','error_caso'));
   
    }

    //Proceso excel de facturas en proveedores
    public function procesarExcel(Route $route, Request $request, FacturasRepo $facturasRepo, FacturasItemsRepo $facturasItemsRepo, PrestacionesFacturasItems $prestacionesFacturasItems,
                                  PrestacionesRepo $prestacioneRepo, LiquidacionesRepo $liquidacionesRepo){
        $data = $request->get('data');
      
        $liq = $liquidacionesRepo->getModel()->where('nro_liquidacion_proveedor','=',$data['n_liquidacion'][0])->get();
     

        if(count($liq) > 0){
            return redirect()->route('proveedores.detalle', $request->get('proveedor_id'))->with(['msg_danger' => 'El número de liquidación ya está en uso.']);
        }

        $liquidacion = $liquidacionesRepo->create([
            'nro_liquidacion_proveedor' => $data['n_liquidacion'][0],
            'proveedores_id' => $request->get('proveedor_id'),
            'fecha_liquidacion' => date('Y-m-d'),
            'nro_liquidacion_interna' => $request->get('proveedor_id').$data['n_liquidacion'][0],
        ]);


        for ($i = 0; $i < count($data['fecha_venta']); $i++)
        {
            $factura = $facturasRepo->getModel()->where('nro_factura', $data['n_factura'][$i])->get();
            $caso_find   = Casos::find($data['n_caso'][$i]);

            if(!is_null($caso_find)) {

                //if(!array_key_exists($i, $data['error_importe'])) {

                if($factura->count() == 0){
                         $newFactura = $facturasRepo->create([
                         'fecha'=> $data['fecha_factura'][$i] ,
                         'nro_factura' => $data['n_factura'][$i],
                         'proveedores_id' => $request->get('proveedor_id'),
                         'casos_id' => $data['n_caso'][$i],
                         'liquidaciones_id' => $liquidacion->id,
                         ]);

                        $itemFactura = $facturasItemsRepo->create([
                        'facturas_id'=> $newFactura->id ,
                        'cantidad'=> $data['cantidad'][$i],
                        'detalle'=> $data['producto'][$i] .' : '. $data['droga_generica'][$i] ,
                        'precio_unitario'=> $data['importe'][$i],
                        'fecha_entrega' =>$data['fecha_venta'][$i]
                        ]);

                    }else{

                        $itemFactura = $facturasItemsRepo->create([
                        'facturas_id'=> $factura->first()->id ,
                        'cantidad'=> $data['cantidad'][$i],
                        'detalle'=>$data['producto'][$i] .' : '. $data['droga_generica'][$i] ,
                        'precio_unitario'=>$data['importe'][$i],
                        'fecha_entrega' =>$data['fecha_venta'][$i]
                         ]);

                }
           // }

        }        
        
        }
        
        return redirect()->route('proveedores.detalle', $request->get('proveedor_id'))->with(['msg_success' => 'Registro creado Correctamente.']);

    }
    
    public function subirPresupuesto(Route $route, Request $request, Excel $excel){
        
        $file = $request->file;

        $results = $excel->load($file, function ($reader) {

            $results = $reader->get();

        })->get();


        $req = [];
        $errors = [];
        $data = [];
        $proveedor = $request->proveedores_id;
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        //validar campos
        foreach ($results as $result) {
            
            $req['presupuesto_nro'] = intval($result->presupuesto_nro);
            $req['prestacion_nro']  = intval($result->prestacion_nro);

                $val = Validator::make($req, [
                    'prestacion_nro'    =>  'required|exists:prestaciones,id',
                    'presupuesto_nro'   =>  'required|exists:presupuestos,id',
                     
                ],[
                    'prestacion_nro.exists'   => 'El campo :attribute no existe',
                    'prestacion_nro.required' => 'El campo :attribute es requirido.',
                    //'presupuesto_nro.unique'  => 'La prestaci&oacute;n ya esta presupuestada.',
                    'presupuesto_nro.exists'  => 'El n&uacute;mero de presupuesto no es v&aacute;lido.',
                     
                ]);
                if ($val->fails())
                {
                    $result->error = $val->messages();
                    
                }

            array_push($data, $result);
        }

       return view('proveedores.importErrorsPresupuestos',compact('data','proveedor'));

    }


    public function procesarPresupuesto(Route $route, Request $request, PresupuestosRepo $presupuestosRepo, PrestacionesRepo $prestacionesRepo){


        /*
        $error = $request->get('error');
        if(isset($error)){

            return redirect()->back();

        }
        */

        $data = $request->get('data');
        
        for($i = 0; $i < count($data); $i++) {
            if(!empty($data['presupuesto_nro'][$i]))
            {
                
                $presupuesto = $presupuestosRepo->find($data['presupuesto_nro'][$i]);
                //$presupuesto->cantidad = $data['cantidad_ofertada'][$i];
                //cantidad solicitada
                //$presupuesto->cantidad_ofertada = $data['cantidad_ofertada'][$i];
                
                $presupuesto->precio_unitario =$data['precio_unitario'][$i];
                $presupuesto->total = $data['precio_total'][$i];
                $presupuesto->cantidad_ofertada    = $data['cantidad_ofertada'][$i];
                $presupuesto->estado = 2;
                $presupuesto->save();
                

                //$presupuesto->Pedido->save();

                //$prestacion=$data['prestacion_nro'][$i];
                /*
                $prestacion=$prestacionesRepo->find(intval($data['prestacion_nro'][$i]));

                if(count($prestacion->Presupuestos()->where('estado',2)->get()) == count($prestacion->Presupuestos)) {
                    $prestacion->is_facturado = 1;
                    $prestacion->save();
                }
                */
            }    
            
            
        } 
       

        return redirect()->route($this->index)->with(['msg_success'=>'Presupuestos actualizados Correctamente.']);
    }

    public function crearFactura()
    {

        $this->data['proveedoresId'] = $this->route->getParameter('id');
        $this->data['proveedor'] = $this->repo->find($this->route->getParameter('id'));
        return view('proveedores.factura')->with($this->data);
    }
    
    public function addItems(FacturasRepo $facturasRepo)
    {

        $this->data['models'] = $facturasRepo->find($this->route->getParameter('facturasId'));

        return view('proveedores.factura')->with($this->data);
    }


    public function postCrearFactura(CreateFacturaRequest $request, FacturasRepo $facturasRepo)
    {


        $facturasId = $facturasRepo->create($request->all());

        return redirect()->route('proveedores.addItems', $facturasId->id);
    }

    public function postAddItems(CreateItemsRequest $request, FacturasItemsRepo $facturasItemsRepo)
    {

        $items = $facturasItemsRepo->create($request->all());

        return redirect()->back()->with(['msg_success'=>'El item se agregó correctamente a la factura.']);
    }

    public function deleteItem(Route $route, FacturasItemsRepo $facturasItemsRepo)
    {
        $model=$facturasItemsRepo->find($route->getParameter('id'));
        $model->delete();
        
        return redirect()->back()->with(['msg_danger'=>'Item borrado Correctamente.']);

    }

    public function findFacturas()
    {

        $facturas = $this->repo->getModel()->find($this->route->getParameter('id'))->Facturas;

        return response()->json($facturas);
    }

    public function detalleFactura(FacturasRepo $facturasRepo, $nro, FacturasItemsRepo $facturasItemsRepo)
    {
        $models = $facturasRepo->search($nro);
        $resolucion = $facturasRepo->resolucion($models->id);


        return view('proveedores.factura_detalle', compact('models', 'resolucion'));
    }

    public function getIndex()
    {

        $this->data['model'] = $this->repo->all();
        return parent::getIndex();

    }

    public function getDetalle()
    {
        $this->data['fechaHoy']   = date('Y-m-d');
        $this->data['fechaVen']   = date('Y-m-d', strtotime("-29 days")); 
        $id = $this->route->getParameter('id');
        
        $this->data['models'] = $this->repo->find($id);
        $this->data['liquidaciones'] = $this->data['models']->Liquidaciones()
                                            ->whereBetween('fecha_liquidacion',[ $this->data['fechaVen'] , $this->data['fechaHoy']])
                                            ->orderBy('id','DESC')->get(); 

        return view()->make('proveedores.detalle')->with($this->data);
    }

    public function getAyudaDirecta()
    {

        $proveedor = $this->repo->find($this->route->getParameter('id'));
        $proveedor->ayuda_directa = $this->route->getParameter('estado');
        $proveedor->save();
        return redirect()->back()->with(['msg_success'=>'Registro Editado.']);

    }

    public function postCreate(Request $request)
    {   
        $this->validate($request, $this->validaciones($request), $this->mensajes($request));
        $this->repo->create($request->all());
        return redirect()->route($this->index)->with(['msg_success'=>'Registro creado Correctamente.']);
    }


     public function postUpdate(Request $request)
    {   

        $id = $this->route->getParameter('id');
        $model = $this->repo->find($id);

    //    $this->validate($request, $this->validaciones($request), $this->mensajes($request));

        $rules = array(
            'razon_social' => 'required',
            'cuit' => 'required|unique:proveedores,cuit,' . $this->route->getParameter('id'),
            'proveedores_tipos_id' => 'required',
            'tel' => 'required',

            //'mail' => 'required',
            //'mail' => 'required',
            'contacto' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'contacto' => 'required',
            'cp' => 'required'       // required and has to match the password field
        );

        if(!empty($request->get('mail'))){
            foreach($request->get('mail') as $key => $val){
                $rules['mail.'.$key] = 'required|email' ;

            }
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }

        $this->repo->edit($model, $request->all());

        return redirect()->route($this->index)->with(['msg_info'=>'Registro editado Correctamente.']);

    }

    public function validaciones($request)
    {


      $rules = [

            'razon_social' => 'required',
            'cuit' => 'required|unique:proveedores,cuit,' . $this->route->getParameter('id'),
            'proveedores_tipos_id' => 'required',
            'tel' => 'required',
            'contacto' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'contacto' => 'required',
            'cp' => 'required'

        ];

    
         foreach($request->get('mail') as $key => $val){
            $rules['mail.'.$key] = 'required|email|unique:proveedores_email,descripcion';

          }

        return $rules;
    }

    public function mensajes($request)
    {

        $mensajes =[


            'razon_social.required' => 'El campo :attribute es requirido.',
            'cuit.required' => 'El campo :attribute es requirido.',
            'cuit.unique' => 'El número de cuit ya está en uso.',
            'proveedores_tipos_id.required' => 'Seleccione al menos un tipo de proveedor.',
            'tel.required' => 'El campo :attribute es requirido.',
            //'mail.required' => 'El campo :attribute es requirido.',
            'contacto.required' => 'El campo :attribute es requirido.',
            'direccion.required' => 'El campo :attribute es requirido.',
            'ciudad.required' => 'El campo :attribute es requirido.',
            'provincia.required' => 'El campo :attribute es requirido.',
            'contacto.required' => 'El campo :attribute es requirido.',
            'cp.required' => 'El campo :attribute es requirido.',
            //'mail.email' => 'Escriba un email correcto.'

        ];

       
          foreach($request->get('mail') as $key => $val){
            $messages['mail.'.$key.'.required'] = 'El email es requerido.';
            $messages['mail.'.$key.'.email'] = 'El formato de email es incorrecto.';

          }
        
        return $mensajes;
    }
    
    public function descargaFarmaciaExcel(){

        $file = Storage::disk('local')->get('excel/farmacias.xlsx');

        return (new Response($file, 200))
              ->header('Content-Type', 'farmacias');

        // return response()->download(public_path('file_path/from_public_dir.pdf'));
    }

    public function procesarLiquidacion(LiquidacionesRepo $liquidacionesRepo, Request $request)
    {
        $model = $liquidacionesRepo->find($request->get('liquidaciones_id'));
      
        $model->nro_if_anexo = $request->get('nro_if_anexo');
        $model->nro_expediente_electronico = $request->get('nro_expediente_electronico');
        $model->nro_expediente_edadse         = $request->get('nro_expediente_edadse');
        $model->if_proyecto_resolucion      = $request->get('if_proyecto_resolucion');
        $model->if_providencia_asubse      = $request->get('if_providencia_asubse');
        $model->if_providencia_resolucion      = $request->get('if_providencia_resolucion');

        $model->save();
        return redirect()->back()->with(['msg_ok'=>'Liquidación procesada con éxito.']);

    }

    public function getLiquidacion(LiquidacionesRepo $liquidacionesRepo, Route $route, CasosRepo $casosRepo, Excel $excel)
    {
        $model = $liquidacionesRepo->find($route->getParameter('liquidacion_id'));
        $xls = $route->getParameter('xls');

        $total = $model->Facturas->sum(function ($model) {
            return $model->FacturasItems->sum('precio_unitario');
        });
        
        

        $importe_total                = number_format($total, 2, ',','');
        $importe_total_texto          = $this->number->to_word($importe_total,null,'decimal');


        $pdf = PDF::loadView('proveedores.liquidacion.pdf',compact('model','CasosRepo','importe_total','importe_total_texto'));

        $data['model'] = $model;
        $data['casosRepo'] = $casosRepo;
        $data['importe_total'] =  $importe_total;
        $data['importe_total_texto'] =  $importe_total_texto;

        if(!is_null($xls)){

            $excel->create('New file', function($excel) use ($data) {

                $excel->sheet('New sheet', function($sheet)  use ($data)  {

                    $sheet->loadView('proveedores.liquidacion.xls')->with($data);
                });

            })->export('xls');
        }else{

            return $pdf->stream();

        }


    }

//    public function procesarAnexo(LiquidacionesRepo $liquidacionesRepo, Route $route){
//
//        $model = $liquidacionesRepo->find($route->getParameter('liquidacion_id'));
//        $model->anexo = 1;
//        $pdf = PDF::loadView('proveedores.liquidacion.pdf',compact('model'));
//        return $pdf->stream();
//    }



    public function getProvidencia(Route $route, LiquidacionesRepo $liquidacionesRepo){
        $model = $liquidacionesRepo->find($route->getParameter('liquidacion_id'));
        $total = $model->Facturas->sum(function ($model) {
                return $model->FacturasItems->sum('precio_unitario');
        });
        
        $importe_total                = number_format($total, 2, ',','');
        $importe_total_texto          = $this->number->to_word($importe_total,null,'decimal');
       
        $pdf = PDF::loadView('reportes.providencia',compact('model','importe_total', 'importe_total_texto'));
        return $pdf->stream();
        
    }

//    public function procesarResolucion(Request $request, LiquidacionesRepo $liquidacionesRepo){
//
//        dd($request->all());
//    }

    public function getResolucion(Request $request, LiquidacionesRepo $liquidacionesRepo, Route $route)
    {
        $model = $liquidacionesRepo->find($route->getParameter('liquidacion_id'));
        $total = $model->Facturas->sum(function ($model) {
                return $model->FacturasItems->sum('precio_unitario');
        });

        $importe_total                = number_format($total, 2, ',','');
       
        $importe_total_texto          = $this->number->to_word($importe_total,null,'decimal');
       

        $pdf   = PDF::loadView('reportes.resolucion',compact('model','importe_total','importe_total_texto','total'));
        return $pdf->stream();
    }

    public function getAnexo(Request $request, Route $route, LiquidacionesRepo $liquidacionesRepo){

        $model = $liquidacionesRepo->find($route->getParameter('liquidacion_id'));
        $model->anexo = 1;

        $total = $model->Facturas->sum(function ($model) {
            return $model->FacturasItems->sum('precio_unitario');
        });

        $importe_total                = number_format($total, 2, ',','');
        $importe_total_texto          = $this->number->to_word($importe_total,null,'decimal');


        $pdf = PDF::loadView('reportes.anexo',compact('model','importe_total','importe_total_texto'));
        return $pdf->stream();
    }

    public function getLiquidacionAjax(LiquidacionesRepo $liquidacionesRepo)
    {
        $liquidacion = $liquidacionesRepo->find($this->route->getParameter('liquidacion_id'));

        return $liquidacion;
    }

    public function getliquidacionesHistorico(Route $route, Request $request){

        $month      = date('m');
        $year       = date('Y');
        $limit      = 25;
        $search     = $request->search;
        $fechaVen   = date('Y-m-d', strtotime("-30 days")); 
        
        
        if($request->has('search')){
            $models = $this->repo->find($request->get('proveedores_id'));
            $liquidaciones = $models->Liquidaciones()
                                    ->where('nro_liquidacion_proveedor','like','%'.$search.'%')
                                    ->orWhere('nro_liquidacion_interna','like','%'.$search.'%')
                                    ->paginate($limit);

        }        
        else{
            
            $models = $this->repo->find($route->getParameter('id'));
            $liquidaciones = $models->Liquidaciones()
                                    ->where('fecha_liquidacion','<=',$fechaVen)
                                    ->paginate($limit);
                                               
        }

         
        return view('proveedores.liquidacionesHistorico',compact('models','search','liquidaciones'));

    }

    public function deleteLiquidacion(Route $route,LiquidacionesRepo $liquidacionesRepo){
        $liquidacion = $liquidacionesRepo->find($route->getParameter('id'));
        //delete de todos los items que pertenecen a la factura de la liquidación
        foreach ($liquidacion->Facturas as $factura) {
            $factura->FacturasItems()->delete();
        }
        //delete de todas las facturas que tenga la liquidación
        $liquidacion->Facturas()->delete();
        //delete de la liquidación
        $liquidacion->delete();

        return redirect()->back()->with(['msg_danger' => 'La liquidación ha sido borrada correctamente.' ]);
        
    }

    public function subirCompulsas(Route $route, Request $request, Excel $excel, PresupuestosRepo $presupuestosRepo ){
        $file = $request->file;

        $results = $excel->load($file, function ($reader) {

            $results = $reader->get();

        })->get();


        $req = [];
        $errors = [];
        $data = [];
        $proveedor = $request->proveedores_id;
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        //validar campos
        foreach ($results as $result) {
            $presupuesto                            = Presupuestos::find(intval($result->presupuesto_nro));
            if(!is_null($presupuesto)){
                $presupuesto->precio_unitario       = $result->precio_unitario;
                $presupuesto->total                 = $result->precio_total;
                $presupuesto->cantidad_ofertada     = $result->cantidad_ofertada;
                $presupuesto->estado                = 2;
                $presupuesto->save();

                $presupuesto->Pedido->cantidad_solicitada    = $result->cantidad_solicitada;
                $presupuesto->Pedido->save();
            }
        }

        return redirect()->back()->with(['msg_ok', 'Compulsa cargada correctamente.']);

    }
    

    public function actaDeApertura(Route $route, PrestacionesRepo $prestacionesRepo){


        $prestaciones =  $prestacionesRepo->find($route->getParameter('prestacionesId')); 
        

        /*
        $proveedores = Proveedores::whereHas('Presupuestos', function ($q) {
            $q->where('estado', 8);

        })->get();
        */

        $pdf = PDF::loadView('proveedores.acta_de_apertura',compact('prestaciones'));
        return $pdf->stream();
      
    }

}
