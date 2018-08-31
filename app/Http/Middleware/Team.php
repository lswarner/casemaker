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
        $route_name= $request->route()->getName();
        $casestudy= $parm["casestudy"];               //get the CaseStudy instance from the associative array


        //if the user is not logged in, send them to home
        if(is_null( $request->user() ) ){
          return redirect('home');
        }


        if( $casestudy->team->contains('id', $request->user()->id) || $request->user()->is_admin == true ){

          //skip this filtering logic for reopen- since this is the ONE INSTANCE when a submited case study
          //should be edited by a team member
          if($route_name == "reopen"){
            return $next($request);
          }

          //if the user is an admin or team member, then we change their route based ont eh case study's status
          switch($casestudy->status){

            case "created":       //submitted case studies: admin and team members can edit
              return $next($request);
              break;

            case "submitted":     //submitted case studies: admin can edit...
              if($request->user()->is_admin == true){
                  return $next($request);
              }
              else {              //...but team members see SHOW view
                return redirect()->route('casestudy.show', $casestudy);
              }
              break;

              case "published":   //everyone is sent to SHOW view
              return redirect()->route('casestudy.show', $casestudy);
              break;

            default:
              return $next($request);
              break;
          }

        }

        //if the user is not an admin or team member, send them to home
        else {
          return redirect('home');
        }
    }
}
