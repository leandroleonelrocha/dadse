<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Repositories\HospitalesRepo;
use Illuminate\Routing\Route;

class HospitalesController extends Controller
{
    protected $hospitalesRepo;    

    public function __construct( Route $route , HospitalesRepo $hospitalesRepo)
    {
        $this->route            =  $route;
        $this->hospitalesRepo   =  $hospitalesRepo;
      
        
    }

    public function index()
    {
        //
        $model = $this->hospitalesRepo->all();
        return view('hospitales.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hospitales.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['descripcion' => 'required','ciudad'=>'required']);
        $data = $request->all();
        $this->hospitalesRepo->create($data);

        return redirect()->route('hospitales.index')->with(['msg_info' => 'Hospital agregado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id    = $this->route->getParameter('id');
        $model = $this->hospitalesRepo->find($id);
      
        return view('hospitales.form',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request, ['descripcion' => 'required','ciudad'=>'required']);
        $id    = $this->route->getParameter('id');
        $model = $this->hospitalesRepo->find($id);
        $data  = $request->all();
        $this->hospitalesRepo->edit($model, $data);
      
       return redirect()->route('hospitales.index')->with(['msg_info' => 'Hospital editado correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id    = $this->route->getParameter('id');
        $model = $this->hospitalesRepo->find($id);
        $model->delete();
        
       return redirect()->route('hospitales.index')->with(['msg_success' => 'Hospital borrado correctamente.']);

    }
}
