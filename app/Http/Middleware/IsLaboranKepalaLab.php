<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLaboranKepalaLab
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
         if (Auth::user() && (Auth::user()->role === 'KEPALA LAB'|| Auth::user()->role === 'LABORAN')){
             return $next($request);
         }else{
             return redirect('/dashboard');
         }
    }
}
