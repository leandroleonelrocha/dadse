<?php
namespace App\Http\Controllers;

use App\Http\Repositories\CuentaCorrienteRepo;
use App\Entities\CuentaCorriente;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCuentaCorrienteRequest;

class CuentaCorrienteController extends Controller {

    protected $cuentaRepo;
   

    public function __construct( CuentaCorrienteRepo $cuentaRepo ){
        $this->cuentaRepo = $cuentaRepo;
       
    }

    public function index(){

       $cuenta = $this->cuentaRepo->all()->first(); 
       return view('config.cuenta.form', compact('cuenta'));
        
    }

    public function create(){
      return view('config.cuenta.form');
    }   

    public function store(CreateCuentaCorrienteRequest $request){
      
       if(!isset($request->id)){
        $this->cuentaRepo->create($request->all());
       }
       else{
        $cuenta = $this->cuentaRepo->find($request->id);
        $this->cuentaRepo->edit($cuenta, $request->all());
       }
       return redirect()->back()->with(['msg_success'=>'Cuenta corriente creada Correctamente.']);
       
    }

    public function edit($id){
      
    }

    public function update($id,CreateRolesRequest $request){
     
    }



    public function delete($id){

    }




}