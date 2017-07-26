<?php

namespace App\Http\Middleware;

use Closure;
use App\CaseStudy;

class Team
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
        $parm= $request->route()->parameters('casestudy'); //pull the {casestudy} parameter out of the request's route
        $casestudy= $parm["casestudy"];               //get the CaseStudy instance from the associative array


        if( $casestudy->team->contains('id', $request->user()->id) || $request->user()->is_admin == true ){
          return $next($request);
        }
        else {
          return redirect('home');
        }
    }
}
