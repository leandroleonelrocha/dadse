<?php

namespace App\Entities;



class Documentos extends Entity
{
    protected $table        = 'documentos';
    protected $fillable     = ['file_type','file_size','file_extensions','description','observaciones','user_id','casos_id'];


     public function getFullNameAttribute()
    {
        return $this->id .'.'. $this->file_extensions;
    }

}
