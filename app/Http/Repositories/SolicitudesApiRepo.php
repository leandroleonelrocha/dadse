<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 26/08/2015
 * Time: 12:07 PM
 */
namespace App\Http\Repositories;

use App\Entities\Profiles;
use App\Http\Functions\ApimdsFunction;

class SolicitudesApiRepo extends BaseRepo {

    protected  $api ;

    public function __construct(ApimdsFunction $api){

        $this->api              = $api;
    }

    public function getSolicitudesPendientes(){

        $metodo                  = 'solicitudes';
        $parametro               = 'clasificacion=1&estado=3';

        $this->api->call(env('API_MDS_URL_INSOL').$metodo.'?'.$parametro);

        $data =  $this->api->getResultado()->results;

        return $data;
    }

    public function getSolicitudesDetail($idSolicitud = null){

        $metodo                     = 'solicitudes';
        $parametro                  =  $idSolicitud;

        $this->api->call(env('API_MDS_URL_INSOL').$metodo.'/'.$parametro);

        $data = $this->api->getResultado()->results;

        return $data;
    }

    public function getOrganizacionDetail($idOrganizacion = null){

        $metodo                  = 'organizacion';
        $parametro               =  $idOrganizacion;

        $this->api->call(env('API_MDS_URL_INSOL').$metodo.'/'.$parametro);
        $data     =  $this->api->getResultado()->results;

        return $data;
    }

    public function getPersonaDetail($idPersona = null){

        $metodo                  = 'personas';
        $parametro               =  $idPersona;

        $this->api->call(env('API_MDS_URL_INSOL').$metodo.'/'.$parametro);
        $data     =  $this->api->getResultado()->results;

        return $data;
    }


    public function getSolicitudesPrestaciones($idSolicitud = null){

        $metodo = 'solicitudes/'.$idSolicitud.'/prestaciones';

        $this->api->call(env('API_MDS_URL_INSOL').$metodo);

        $data  = $this->api->getResultado()->results;

        return $data;
    }



    public function getClasificaciones(){

        $metodo = 'clasificaciones';
        $this->api->call(env('API_MDS_URL_INSOL').$metodo);

        return $this->api->getResultado()->results ;
    }

    public function getPrestaciones($id_prestacion = null){

        $metodo  = 'prestaciones/'.$id_prestacion;

        $this->api->call(env('API_MDS_URL_INSOL').$metodo);

        $prestacion         = $this->api->getResultado()->results;

        return $prestacion;
    }


    public function getModel(){

    }

}