<?php namespace App\Http\Functions;


class KairosFunction extends ApiUnidbFunction
{
    protected $service;

    public function __construct()
    {
        parent::__construct();

        $this->service = env('API_MDS_UNIDB_SERVICE');
    }

    public function searchDrogasKairos($search = null){

        $url = $this->urlBase . '/' . $this->service . "/kairos/drogas?search=$search&limit=100";
        $this->call($url);
    }

    public function searchProductosKairos($search = null){

        $url = $this->urlBase . '/' . $this->service . "/kairos/productos?search=$search&limit=100";
        $this->call($url);
    }

    public function searchPresentacionesKairos($id = null ){

        $url = $this->urlBase . '/' . $this->service . "/kairos/drogas/$id/presentaciones";
        $this->call($url);
    }

    public function searchPresentacionesDetalleKairos($idPresentacion = null , $idProducto = null){


        $url = $this->urlBase . '/' . $this->service . '/kairos/presentaciones/'.$idPresentacion.'?producto='.$idProducto;
        
        $this->call($url);
    }


}