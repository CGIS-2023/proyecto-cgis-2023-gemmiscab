<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$tipo_usuario_ids)
    {
        if(collect($tipo_usuario_ids)->contains(Auth::user()->tipo_usuario_id)){
            return $next($request);
        }
        else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
