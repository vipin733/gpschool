<?php

namespace App\Http\Middleware;

use Closure;
use App\Student;

class Transmiddleware
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
        // 
        //
        // $user = $request->user()->students->transportation;
        //
        // if ($user == 1){
        //     return $next($request);
        // }
        // else {
        //   flash('Sorry! You Do not have opted transportation facility, take transportation facility.', 'danger');
        //   return redirect('/home');
        // }

    }
}
