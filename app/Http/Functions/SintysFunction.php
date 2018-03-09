<?php namespace App\Http\Functions;


class SintysFunction extends ApimdsFunction
{
    public function buscarPersona($fullname = null, $documento = null, $cuil = null)
    {
        $parametros = [
            'documento' => $documento,
            'fullname' => $fullname,
            'cuil' => $cuil
        ];

        $url = $this->urlBase . '/unidb/sintys/personas?' . http_build_query($parametros) ;
        $this->call($url);
    }
}
