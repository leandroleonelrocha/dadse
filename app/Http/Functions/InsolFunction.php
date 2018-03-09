<?php namespace App\Http\Functions;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InsolFunction extends ApimdsFunction
{
    protected $service;

    public function __construct()
    {
        parent::__construct();

        $this->service = env('API_MDS_INSOL_SERVICE');
    }


    // casos
    public function getCasos()
    {
        $ayudaDirectaSlug = 'dadse.ayuda.directa';
        $altoCostoSlug = 'dadse.alto.costo';

        $url = $this->urlBase . '/' . $this->service . "/casos?tipo_slug=".$ayudaDirectaSlug.",".$altoCostoSlug."&estado_slug=pendiente&limit=50";
        
        $this->call($url);

    }

    public function getCasosPendientesToday()
    {
        $currentDate = Carbon::now();
        $fechaDesde = $currentDate->copy()->format('Y-m-d');
        $fechaHasta = $currentDate->copy()->addDay()->format('Y-m-d');
        $tipoSlugs = 'dadse.ayuda.directa,dadse.alto.costo';

        $url = $this->urlBase . '/' . $this->service . "/casos?limit=200&tipo_slug=$tipoSlugs&estado_slug=pendiente&fecha_desde=$fechaDesde&fecha_hasta=$fechaHasta";

        $this->call($url);

    }

    public function getCasosDetalle($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id;

        $this->call($url);
    }

    public function getDocumentos($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id."/documentos";

        $this->call($url);
    }

    public function getFile($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/documentos/".$id."/file";

        $this->call($url);
        
    }

    public function getNotas($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id."/notas";
        
        $this->call($url);
    }

    public function postNotas($id , $msg)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id."/notas";

        $body =  [ 'username'=> Auth::user()->username ,'mensaje'=> $msg];

        $this->call($url,'POST', $body);
    }

    public function postCasosCerrar($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id;

        $body =  [ 'username'=> Auth::user()->username ,'estado_slug'=> 'finalizado' ];

        $this->call($url,'PATCH', $body);
    }
/// solicitudes

    public function searchSolicitudes($clasificacion = '', $estado = '')
    {
        $url = $this->urlBase . '/' . $this->service . "/solicitudes?clasificacion=$clasificacion&estado=$estado&limit=100";
        $this->call($url);
    }

    public function getSolicitud($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/solicitudes/$id";
        $this->call($url);
    }

    public function getPrestacionesSolicitud($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/solicitudes/$id/prestaciones";
        $this->call($url);
    }

    public function getPersona($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/personas/$id";
        $this->call($url);
    }

    public function getOrganizacion($id)
    {
        $url = $this->urlBase . '/' . $this->service . "/organizacion/$id";
        $this->call($url);
    }

    public function getClasificaciones()
    {
        $url = $this->urlBase . '/' . $this->service . '/clasificaciones';
        $this->call($url);
    }

    public function updatePrestacion($idPrestacion, $idClasificacion = null, $idEstado = null, $cantidad = null)
    {
        $url = $this->urlBase . '/' . $this->service . "/prestaciones/$idPrestacion";
        $datos = [];

        // Clasificacion
        if (!is_null($idClasificacion) && $idClasificacion > 0)
            $datos['clasificacionId'] = $idClasificacion;

        // Estado
        if (!is_null($idEstado) && $idEstado > 0)
            $datos['estadoId'] = $idEstado;

        // Cantidad
        if (!is_null($cantidad))
            $datos['cantidad'] = $cantidad;

        $this->call($url, 'patch', $datos);
    }

    public function patchCasos($id , $estado, $motivoAnulacion = null)
    {
        //$datos['estado_slug'] = $estado;

        //$url = $this->urlBase . '/' . $this->service . "/casos/$id";
        $url = $this->urlBase . '/' . $this->service . "/casos/".$id;

        $body =  [ 'username'=> Auth::user()->username ,'estado_slug'=> $estado, 'motivo_anulacion' => $motivoAnulacion ];


        $this->call($url,'patch',$body);


    }

    public function postLog($idCaso, $username, $titulo, $action, $type, $timeline_show, $timeline_titulo, $timeline_body)
    {
        $url = $this->urlBase . '/' . $this->service . "/casos/$idCaso/logs";
        $datos = [
            'username' => $username,
            'titulo' => $titulo,
            'action' => $action,
            'type' => $type,
            'timeline_show' => $timeline_show,
            'timeline_titulo' => $timeline_titulo,
            'timeline_body' => $timeline_body
        ];

        $this->call($url, 'post', $datos);
    }
}