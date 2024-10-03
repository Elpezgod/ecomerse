<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            $user = Auth::user();
            
            // Redirigir según el rol del usuario
            if ($user->hasRole('Administrador')) {
                return redirect('/dashboard');
            } elseif ($user->hasRole('Cliente')) {
                return redirect('/dashboardclient');
            }
        }

        return $next($request);
    }
}