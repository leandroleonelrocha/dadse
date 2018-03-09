<?php

namespace App\Entities;


class Localidades extends Entity
{
    protected $table        = 'localidades';
    protected $fillable     = ['name','municipio_id'];



}
