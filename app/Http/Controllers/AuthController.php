<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Functions\SsoFunction;
use App\Http\Repositories\UserRepo;
use Illuminate\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $userRepo;
    protected $auth;

    public function __construct(UserRepo $userRepo, Guard $auth)
    {
        $this->userRepo = $userRepo;
        $this->auth = $auth;
    }

    public function login(SsoFunction $ssoFunction)
    {   

        if (! $this->auth->check())
            return redirect()->to(env('SSO_URL', '') . '/auth/check?redirect=' . route('auth.validate'));
        else
            return redirect()->intended('home');

    }

    public function validateLogin(Request $request, SsoFunction $ssoFunction)
    {   

        if (! $request->has('user') || ! $request->has('token')) abort(403);

        // Valido el token

        $ssoFunction->validate($request->get('user'), $request->get('token'));
        

        if ($ssoFunction->getHttpCode() != 200) abort(403);
            $datosSso = $ssoFunction->getResultado();

        // Reviso que el usuario exista y tenga acceso
        $user = $this->userRepo->searchByUsername($request->get('user'));


        //if (empty($user) || is_null($user)) abort(403);
        if (empty($user) || is_null($user)) abort(403);


        $user->sedes_id = $datosSso->result->user->sede->id or 0 ;
        $user->save();

        // Login de usuario
        Auth::login($user, true);

        // Guardo en sesion, el sesión id de sso
        session()->put('sso_session_id', $datosSso->result->sessionId);
        
        // Attempt
        $urlAttempt = $request->cookie('url_goto', '');

        if ($urlAttempt != '')
            return redirect()->to($urlAttempt);
        else
            return redirect()->route('dashboard.index');
    }


}
