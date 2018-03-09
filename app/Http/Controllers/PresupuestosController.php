<?php
namespace App\Http\Controllers;

use App\Entities\Prestaciones;
use App\Entities\PrestacionesProductos;
use App\Entities\Presupuestos;
use App\Entities\Proveedores;
use App\Entities\PrestacionesPedidos;
use App\Http\Repositories\PrestacionesProductosRepo;
use App\Http\Repositories\PrestacionesPedidosRepo;
use App\Http\Repositories\PresupuestosRepo;
use App\Http\Repositories\ProveedoresRepo;
use App\Http\Repositories\ProveedoresTiposRepo;
use App\Http\Repositories\CompulsasRepo;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class PresupuestosController extends Controller{

    protected $repo;
    protected $request;
    protected $route;
    protected $casos_id;
    protected $proveedoresTipoRepo;
    protected $prestacionesPedidosRepo;
    protected $compulsasRepo;

    public function __construct(PresupuestosRepo $repo , Request $request, Route $route, CompulsasRepo $compulsasRepo,ProveedoresTiposRepo $proveedoresTipoRepo, PrestacionesPedidosRepo $prestacionesPedidosRepo){

        $this->route                   = $route;
        $this->repo                    = $repo;
        $this->data['seccion']         = 'Presupuestos';
        $this->index                   = 'presupuestos.index';
        $this->form                    = 'presupuestos.form';
        $this->casos_id                = Session::get('casos_id');
        $this->proveedoresTipoRepo     = $proveedoresTipoRepo;
        $this->prestacionesPedidosRepo = $prestacionesPedidosRepo;
        $this->compulsasRepo           = $compulsasRepo;

    }

    public function getIndex()
    {

        $this->data['prestaciones_ordinarios'] = Prestaciones::where('estado' ,8 )->get();
        $this->data['prestaciones_urgentes']   = Prestaciones::where('estado' ,9 )->get();
        $this->data['prestaciones_pedidos']    = $this->prestacionesPedidosRepo->all();
       
        //$this->data['prestaciones']            = Prestaciones::whereIn('estado',[8,9,10,11,12])->orderBy('created_at','DESC')->get();
        $this->data['presupuestos']            = Presupuestos::orderBy('created_at','DESC')->get();
        $this->data['proveedores_tipo']        = $this->proveedoresTipoRepo->all();
        $this->data['compulsas']               = $this->compulsasRepo->sortBy(); 
        //$this->data['prestaciones']         = Prestaciones::all();
        $this->data['proveedores']            = Proveedores::all();


        return view()->make($this->index)->with($this->data);
    }
   

    public function getDetalle()
    {
           
        $presupuestos = $this->repo->find($this->route->getParameter('id'));

        return view('presupuestos.detalle')->with(compact($presupuestos));
    }


    public function cargar_monto(CompulsasRepo $compulsasRepo){

        $prestaciones = Prestaciones::whereHas('presupuestos',function ($q){
            $q->where('estado','<>',5);
        })->get();

        $presupuestos = Presupuestos::all()->groupBy("compulsa_id");
        $compulsas    = $compulsasRepo->sortBy();
        return view('presupuestos.cargar_monto',compact('prestaciones','presupuestos','compulsas'));

    }

    public function postCargarMonto(Request $request, prestacionesPedidosRepo $prestacionesPedidosRepo){


        $presupuesto = $this->repo->find($request->presupuesto_id);
        $presupuesto->precio_unitario = $request->precio_unitario;
        $presupuesto->total = $request->total;
        $presupuesto->cantidad_ofertada    = $request->cantidad_ofertada;
        $presupuesto->observacion    = $request->observacion;
        
        //$presupuesto->presupuesto_id    = $request->presupuesto_id;
        //$presupuesto->pedido_id    = $request->pedido_id;

        $presupuesto->estado = 2;
        $presupuesto->save();

        /*
        $pedidoModel                    = PrestacionesPedidos::find($request->pedido_id);
        $pedidoModel->cantidad_ofertada = $request->cantidad_ofertada;
        $pedidoModel->save();
        */

        return redirect()->back()->with(['msg_success'=>'Monto agregado correctamente']);

       
    }

    public function urgentes(Request $request){

        $presupuestos = Presupuestos::where('caracter',1)->get();
        
        return view('presupuestos.urgentes',compact('presupuestos'));
    }

}
