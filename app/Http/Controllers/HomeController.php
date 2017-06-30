<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\CaseStudy;
use \App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user= Auth::user();

      if($user->is_approved == false){
        return view('not-approved');
      }

      $casestudies= $user->casestudies;

      return view('home', compact('casestudies'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $pending_users= User::pending()->get();
        $approved_users= User::approved()->get();


        return view('admin', compact('pending_users', 'approved_users'));
    }
}
