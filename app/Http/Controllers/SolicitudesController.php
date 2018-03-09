<?php
namespace App\Http\Controllers;

use App\Http\Functions\InsolFunction;
use App\Http\Repositories\AltoCostoMedicosRepo;
use App\Http\Repositories\AltoCostoRepo;
use App\Http\Repositories\MedicosRepo;
use App\Http\Repositories\PrestacionesRepo;
use App\Http\Repositories\SolicitudesApiRepo;
use App\Http\Repositories\SolicitudRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;


class SolicitudesController extends Controller
{
    protected $solicitudRepo;

    public function __construct(SolicitudRepo $solicitudRepo)
    {
        $this->solicitudRepo = $solicitudRepo;

        $this->data['seccion']  = 'Solicitudes';
        $this->index            = 'solicitudes.index';
        $this->form             = 'solicitudes.form';

    }

    public function index(InsolFunction $insolFunction)
    {
        $solicitudes = $this->solicitudRepo->listadoTotal();

        /*
        foreach ($this->solicitudRepo->listadoTotal() as $solicitud) {

            $insolFunction->getSolicitud($solicitud->id);
            array_push($solicitudes, $insolFunction->getResultado()->results);
        }*/

        return view('solicitudes.index', compact('solicitudes'));
    }

    public function show(Route $route, InsolFunction $insolFunction)
    {

        $solicitud = $this->solicitudRepo->find($route->getParameter('id'));
        

        // Beneficiario

        switch ($solicitud->beneficiario_tipo) {
            case 'Organizacion':
                $beneficiario = $solicitud->PersonasFisicas;
                break;

            case 'Persona':
                $beneficiario = $solicitud->PersonasFisicas;
                break;
        }


        // Prestaciones

        $prestaciones = $solicitud->Prestaciones;

        //guarda id solicitud en variable de session
        Session::put('solicitud_id', $route->getParameter('id'));

        return view('solicitudes.detalle', compact('solicitud', 'beneficiario', 'prestaciones'));
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
        return redirect()->route($this->index)->with(['msg_success'=>'Prestación enviada y en espera de Informe Médico']);

    }


}
