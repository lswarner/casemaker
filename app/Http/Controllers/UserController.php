<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Events\AccountApproved;
use App\Events\AccountDenied;

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
            return redirect('home');
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

          if( Auth::user()->is_admin ){
            $admin_tools= true;
          }
          else {
            $admin_tools= false;
          }



          return view('user.edit', compact('user', 'request_access', 'admin_tools'));
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
        $data['is_admin'] = ($request->has('is_admin')) ? 1 : 0;
        $user->update($data);

        Session::flash('message', 'Your account was updated.');
        Session::flash('alert-class', 'flash-success');

        return redirect()->route('user.edit', $user);
      }


      public function update_password(UpdatePasswordRequest $request, User $user)
    	{

        $user= Auth::user();

    		$user->password = bcrypt($request->password);
    		$user->save();

    		Session::flash('message', 'Your password was successfully changed.');
    		Session::flash('alert-class', 'flash-sucess');

    		return redirect('home');
    	}


      public function update_access(Request $request, User $user)
    	{


        if($request->action == "approve"){
          $user->is_approved= true;
          $user->save();

          event(new AccountApproved($user));

          Session::flash('message', 'You approved '.$user->name.'\'s access request.');
      		Session::flash('alert-class', 'flash-urc');
        }
        else if($request->action == "deny"){

          //now, delete the actual user from the database
          $user->delete();

          event(new AccountDenied($user));

          Session::flash('message', 'You denied '.$user->name.'\'s access request.');
          Session::flash('alert-class', 'flash-danger');
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
