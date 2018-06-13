<?php

namespace sigafi\Http\Middleware;
use sigafi\User;
use sigafi\TipoUsuario;
use Closure;

class MDusuarioestrategico
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
        if($usuarioactual->idtipousuario!=3){
            
        }
        return $next($request);
    }
}
