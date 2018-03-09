<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (! App::environment('local')){

            $userApiKey = $request->header('Dadse-Api-Key', null);
            $apyKey = env('APP_API_KEY', null);

            if (is_null($userApiKey) || is_null($apyKey) || $apyKey != $userApiKey)
                return response()->json('No autorizado.', 403);

        }

        return $next($request);
            #->header('Access-Control-Allow-Origin', '*')
            #->header('Access-Control-Allow-Methods', 'GET');
    }
}
