<?php
namespace App\Http\Controllers;

use App\Http\Functions\KairosFunction;

class KairosController extends Controller
{

    public function __construct(){

    }

    public function search( $search = null)
    {
        return response()->json($search);
    }


// buscar productos en kairos
    public function getSearch($search = null, KairosFunction $kairosFunction)
    {

        //$kairosFunction->searchProductosKairos($search);
        $kairosFunction->searchDrogasKairos($search);

        $search = $kairosFunction->getResultado();


        $res = [];

        foreach ($search->results as $s) {
            $kairosFunction->searchPresentacionesKairos($s->id);

            $pres = [];

            foreach ($kairosFunction->getResultado()->results as $presentacion) {
                $p = ['clave' => $presentacion->clave, 'descripcion' => $presentacion->descripcion, 'precio' => $presentacion->precio];

                array_push($pres, $p);
            }

            $m = ['id' => $s->id, 'descripcion' => $s->descripcion, 'presentacion' => $pres];
            array_push($res, $m);
        }


        return response()->json($res);
    }

}
