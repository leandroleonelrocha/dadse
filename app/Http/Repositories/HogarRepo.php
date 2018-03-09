<?php namespace App\Http\Repositories;

use App\Entities\Hogar;

class HogarRepo extends BaseRepo
{
    public function getModel()
    {
        return new Hogar();
    }


}