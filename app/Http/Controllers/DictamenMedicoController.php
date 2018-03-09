<?php
namespace App\Http\Controllers;


use App\Entities\Prestaciones;
use App\Entities\PrestacionesPresupuestos;
use App\Entities\PrestacionesProductos;
use App\Entities\Presupuestos;
use App\Http\Repositories\PresupuestosRepo;
use App\Http\Repositories\EspecialidadesRepo;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\MedicosRepo as Repo;
use App\Http\Functions\NumberToLetterConverter;

class DictamenMedicoController extends Controller
{
    protected $route;
    protected $especialidadesRepo;
    protected $validaciones;
    protected $prestaciones;
    protected $presupuestosRepo;
    protected $prestacionesPresupuestos;


    public function __construct(Route $route, Repo $repo, EspecialidadesRepo $especialidadesRepo, Prestaciones $prestaciones, PresupuestosRepo $presupuestosRepo, PrestacionesPresupuestos $prestacionesPresupuestos)
    {
        $this->route = $route;
        $this->data['seccion'] = 'Medicos';
        $this->index = 'medicos.dictamen_medico';
        $this->form = 'medicos.form';
        $this->repo = $repo;

        $this->data['especialidades'] = $especialidadesRepo->listsCombo('nombre', 'id');

        $this->validaciones = $this->validaciones();
        $this->mensajes = $this->mensajes();

        $this->prestaciones = $prestaciones;
        $this->presupuestosRepo = $presupuestosRepo;
        $this->prestacionesPresupuestos = $prestacionesPresupuestos;
    }


    public function getIndex($id = null)
    {
//        $this->data['prestacionesPresupuestos'] = $this->prestacionesPresupuestos
//            ->with('presupuestos','prestaciones')
//            ->whereHas('presupuestos',function ($q){
//                $q->whereDate('fecha_cierre','<=',date('Y-m-d',time()))->where('total','!=','')->where('estado','2');
//            })
//            ->get()
//            ->groupBy('prestaciones_id');

        $this->data['prestacion'] = $this->prestaciones->with('presupuestos')->find($id);

//        $this->data['count'] = $this->data['prestacionesPresupuestos']->count();

        return parent::getIndex();
    }

    public function imprimirAdjudicacion(PDF $PDF)
    {
        
        $prestacionId = $this->route->getParameter('prestacionesId');
        
        $data['prestacion'] = Prestaciones::find($prestacionId);

        $number             = new NumberToLetterConverter();
        $miMoneda           = null;
        //$data['total']      = $number->convertNumber($data['prestacion']->PresupuestoAdjudicado->total,$miMoneda, 'decimal');
        $data['total']      = $number->convertNumber($data['prestacion']->PresupuestoAdjudicado->total,$miMoneda, 'decimal');
 
        $pdf = $PDF->loadView('reportes.notificacion', $data);
        return $pdf->stream();
    }


    public function presupuestoAdjudicado(Request $request, PDF $PDF)
    {
        // VER EN EL CONFIG.DATA Y CONFIG.CUSTOM QUÉ ESTADO VA AHI Y SI FUE CAMBIANDO EN LAS PRESTACIONES
        $request['estado'] = 4;
        $request['adjudicado'] = 1;
        $presu = Presupuestos::find($request->get('presupuesto_id'));
      
        $prestacion = $presu->prestaciones->first();
        //$prestacion->presupuesto_adjudicado = $presu->id;
        $prestacion->estado = 12;
        $prestacion->save();

        $this->presupuestosRepo->edit($presu, $request->all());
        /*
        $data['prestacion'] = $prestacion;
        $number             = new NumberToLetterConverter();
        $miMoneda           = null;
        $data['total']      = $number->convertNumber($data['prestacion']->PresupuestoAdjudicado->total,$miMoneda, 'decimal');

        $pdf = $PDF->loadView('reportes.notificacion', $data);
        return $pdf->stream();
        */
        return redirect()->back()->with(['msg_success'=>'Dictamen médico adjudicado correctamente.']);

       // return redirect()->route('dictamenMedico.index', $prestacion->id)->withErrors('Se ha adjudicado un presupuesto en la prestación');
    }

    public function noAdjudicar($id, Request $request)
    {   

        $prestacion = $this->prestaciones->find($id);

        $prestacion->estado = 8;

        foreach ($prestacion->presupuestos as $presupuesto) {
            $presupuesto->estado = 5;
            $presupuesto->save();
        }

        $prestacion->save();

        return redirect()->route('casos.show', $id)->withErrors('No se ha adjudicado ningún presupuesto en la prestación');
    }


    public function anularAdjudicar(Request $request){
         // VER EN EL CONFIG.DATA Y CONFIG.CUSTOM QUÉ ESTADO VA AHI Y SI FUE CAMBIANDO EN LAS PRESTACIONES
  
        $request['adjudicado'] = 2;
        $presu = Presupuestos::find($request->get('presupuesto_id'));
     
        $this->presupuestosRepo->edit($presu, $request->all());
        /*
        $data['prestacion'] = $prestacion;
        $number             = new NumberToLetterConverter();
        $miMoneda           = null;
        $data['total']      = $number->convertNumber($data['prestacion']->PresupuestoAdjudicado->total,$miMoneda, 'decimal');

        $pdf = $PDF->loadView('reportes.notificacion', $data);
        return $pdf->stream();
        */
        return redirect()->back()->with(['msg_success'=>'Dictamen médico anulado correctamente.']);
    }

    public function validaciones()
    {

        return [
        ];
    }


    public function mensajes()
    {

        return [

        ];

    }

}
