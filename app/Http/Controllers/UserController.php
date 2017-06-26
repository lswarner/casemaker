<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
      {
          $this->middleware('auth');
      }



      /**
       * Display the specified resource.
       *
       * @param  \App\User  $user
       * @return \Illuminate\Http\Response
       */
      public function show(User $user)
      {

        return view('user.show', compact('user'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\User  $user
       * @return \Illuminate\Http\Response
       */
      public function edit(User $user)
      {
          if(! (
            Auth::user()->is_admin ||
            Auth::user() == $user)
          ) {
            abort('404');
          }

          //if the user is pending approval (and not already deleted/denied)
          //AND the active user is an admin, display the view
          //which allows admins to approve or deny
          if( !$user->is_approved && Auth::user()->is_admin ){
            $request_access= true;
          }
          else {
            $request_access= false;
          }


          return view('user.edit', compact('user', 'request_access'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\User  $user
       * @return \Illuminate\Http\Response
       */
      public function update(UpdateUserRequest $request, User $user)
      {
        $data= $request->all();
        $user->update($data);

        Session::flash('message', 'Your account was updated.');
        Session::flash('alert-class', 'flash-urc');

        return redirect('home');
      }


      public function update_password(UpdatePasswordRequest $request, User $user)
    	{

        $user= Auth::user();

    		$user->password = bcrypt($request->password);
    		$user->save();

    		Session::flash('message', 'Your password was successfully changed.');
    		Session::flash('alert-class', 'flash-urc');

    		return redirect('home');
    	}


      public function update_access(Request $request, User $user)
    	{


        if($request->action == "approve"){
          $user->is_approved= true;
          $user->save();


          Session::flash('message', 'You approved '.$user->name.'\'s access request.');
      		Session::flash('alert-class', 'flash-urc');
        }
        else if($request->action == "deny"){

          $user->delete();

          Session::flash('message', 'You denied '.$user->name.'\'s access request.');
          Session::flash('alert-class', 'flash-urc');
    		}

    		return redirect('admin');
    	}




      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\User  $user
       * @return \Illuminate\Http\Response
       */
      public function destroy(User $user)
      {
          //
    }
}
