<?php namespace App\Http\Functions;


class ProtesisFunction extends ApiUnidbFunction
{
    protected $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = env('API_MDS_UNIDB_SERVICE');
    }

    public function searchProtesis($search = null){

        $url = $this->urlBase . '/' . $this->service . "/protesis?search=$search";
        $this->call($url);
    }

    public function searchProtesisDetalle($id = null){

        $url = $this->urlBase . '/' . $this->service . '/protesis/'.$id;
        $this->call($url);
    }

    public function listProtesis(){
        $url = $this->urlBase . '/' . $this->service . '/protesis';
        $this->call($url);
    }

    public  function buscarProtesis($valor)
    {

        $url = $this->urlBase. '/unidb/protesis?search='.$valor.'&limit=50';

        $this->call($url);
    
    }

    public function listaSedes()
    {
        $this->call(env('API_MDS_URL').'/unidb/sedes?search='.'&limit=500');
    }
 

}