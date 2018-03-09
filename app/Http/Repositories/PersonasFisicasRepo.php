<?php namespace App\Http\Repositories;


use App\Entities\CuentaCorriente;
use App\Entities\PersonasFisicas;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class PersonasFisicasRepo extends BaseRepo
{
    public function getModel()
    {
        return new PersonasFisicas();
    }

    public function cuentaCorriente($id = null){

        $persona = $this->model->find($id);

        if(!$persona)
            return null;

        $disponible = $persona->disponibleMensual;

        $p = CuentaCorriente::first()->valor - $disponible;

        return $p;
    }

    public function addNew($data = null)
    {

        $hogarRepo = new HogarRepo();

        //$data = json_decode(json_encode($data->results),true);
        $data    = $data->result;

        //carga persona fisica
        $persona = $this->getModel();
        $persona->id = $data->id;
        $persona->fullname = $data->fullname;
        $persona->fecha_nacimiento = $data->fecha_nacimiento;
        $persona->tipo_documento = $data->tipo_documento->slug;
        $persona->documento = $data->documento;
        $persona->cuil = $data->cuil;
        $persona->email = $data->email;
        $persona->imagen = $data->imagen;
        $persona->telefono_particular = $data->telefono_particular;
        $persona->telefono_movil = $data->telefono_movil;
        $persona->jefe_hogar =  $data->jefe_hogar;


        if(!is_null($data->hogar))
        {//carga hogar
                $hogar = [
                        'provincia' => $data->hogar->vivienda->provincia,
                        'ciudad' => $data->hogar->vivienda->ciudad,
                        'partido' => $data->hogar->vivienda->partido,
                        'municipio' => $data->hogar->vivienda->municipio,
                        'codigo_postal' => $data->hogar->vivienda->codigo_postal,
                        'calle_slug' => $data->hogar->vivienda->calle,
                        'calle_interseccion' => $data->hogar->vivienda->calle_intersecciones,
                        'numero' => $data->hogar->vivienda->numero,
                        'barrio' => $data->hogar->vivienda->barrio,
                        'paraje' => $data->hogar->vivienda->paraje,
                        'manzana' => $data->hogar->vivienda->manzana,
                        'piso' => $data->hogar->vivienda->piso,
                        'dpto' => $data->hogar->vivienda->dpto,
                        'torre' => $data->hogar->vivienda->torre ];


                $hogar = $hogarRepo->create($hogar);

                $persona->hogar_id = $hogar->id;
        }
        $persona->save();



        return ($persona);
    }


    public function updateHogar($data = null){
        dd($data);

    }

}