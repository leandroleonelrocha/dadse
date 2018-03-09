<?php namespace App\Http\Repositories;

use App\Entities\Documentos;
use App\Http\Functions\InsolFunction;

class DocumentosRepo extends BaseRepo
{
    protected $insolFunction;
  
    public function getModel()
    {
        return new Documentos();
    }


    public function __construct( InsolFunction $insolFunction)
    {
      
        $this->insolFunction = $insolFunction;
    
    }

    public function createFile($id)
    {

        $this->insolFunction->getFile($id);

        $new = $this->insolFunction->getResultado()->result;
      
        $file = base64_decode($new->file);
        
        file_put_contents(public_path().'/file/'.$new->file_size.'.'.$new->file_extension, $file);
 
    }

    public function getDocumentos($casos_id)
    {
        return $this->model->where('casos_id', $casos_id)->get();
    }



}