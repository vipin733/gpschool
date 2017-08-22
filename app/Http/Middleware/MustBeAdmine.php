<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmine
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
        $user = $request->user();
        
        if ($user && $user->email == 'admin@gramyanchal.com' )
         {
            return $next($request);
        }else {
          flash('Sorry! You Do not have permission.', 'danger');
          return redirect('/home');
        }

    }
}
