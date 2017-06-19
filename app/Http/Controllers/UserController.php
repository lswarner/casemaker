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


          return view('user.edit', compact('user'));
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
