<?php

namespace App\Http\Middleware;
use App\User;
use App\TipoUsuario;
use Closure;

class MSusuarioempleado
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
        $usuarioactual=\Auth::user();
        if($usuarioactual->idtipousuario!=2){
            
        }
        return $next($request);
    }
}
