<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\EspecialidadesRepo;
use App\Http\Repositories\PrestacionesInformesRepo;

use Illuminate\Routing\Route;
use App\Http\Repositories\UserRepo;

class HomeController extends Controller {

	protected $especialidadesRepo;

	public function __construct( Route $route , EspecialidadesRepo $especialidadesRepo, UserRepo $usersRepo, PrestacionesInformesRepo $prestacionesInformesRepo)
    {
      $this->especialidadesRepo       = $especialidadesRepo;
      $this->prestacionesInformesRepo = $prestacionesInformesRepo;
    }

    public function index()
    {
    	$data['user'] 		        = Auth::user();
    	$data['especialidades']     = $this->especialidadesRepo->listsCombo('nombre','id');
        $data['prestaciones_informes'] = $this->prestacionesInformesRepo->all();
    
        return view('home')->with($data);
    }

    



}