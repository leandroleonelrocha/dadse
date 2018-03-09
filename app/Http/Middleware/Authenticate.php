<?php

namespace App\Http\Middleware;

use App\Entities\User;
use App\Http\Functions\SsoFunction;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    protected $ssoFunction;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth, SsoFunction $ssoFunction)
    {
        $this->auth = $auth;
        $this->ssoFunction = $ssoFunction;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUrl = URL::current();
        $urlCookie = (!is_null($currentUrl)) ? $currentUrl : route('dashboard.index');
        $cookie = cookie('url_goto', $urlCookie, 10);

        // Reviso si hay sesión abierta
        if ($this->auth->guest()) {
            if ($request->ajax())
                return response('Unauthorized.', 401);
            else
                return redirect()->guest('auth/login')->withCookie($cookie);
        }

        // Reviso que la sesión en sso esté abierta
        $sessionId = session('sso_session_id', '');
        $this->ssoFunction->checkSession($sessionId);
        $datosSSo = $this->ssoFunction->getResultado();
        $codeSso = $this->ssoFunction->getHttpCode();

        if ($codeSso != 200 || !$datosSSo->result->active) {
            $this->auth->logout();

            if ($request->ajax())
                return response('Unauthorized.', 401);
            else {
                if ($codeSso == 200)
                    abort(403);
                else
                    return redirect()->guest('auth/login')->withCookie($cookie);
            }
        }

        // Reviso si el usuario está bloqueado en la aplicación
        if (!Auth::user()->is_active) abort(403);

        // Guardo datos del usuario
        $datosUser = $datosSSo->result->user;

       // dd($datosUser);
        $this->_saveUserDate(Auth::user(), $datosUser);

        return $next($request);
    }

    protected function _saveUserDate(User $user, $datos)
    {
        $fecha = Carbon::createFromFormat(\DateTime::ISO8601, $datos->dateUpdated);

        if (!session()->has('sso_last_update') || $fecha->format('d-m-Y H:i:s') > session('sso_last_update')) {
            $user->fullname = $datos->fullname;
            $user->email = $datos->email;
            $user->imagen = $datos->imagen;
            $user->imagen_thumb = $datos->imagenThumb;
            $user->sedes_id =  $datos->sede->id;
            //$user->areas_id = $datos->area->id;
            $user->save();

            session()->put('sso_last_update', $fecha->format('d-m-Y H:i:s'));
        }
    }
}