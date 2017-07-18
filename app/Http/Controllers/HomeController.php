<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        $casestudies= CaseStudy::submitted()->get();


        return view('admin', compact('pending_users', 'approved_users', 'casestudies'));
    }



    public function autosave(){
      Log:info('entering autosave!');

      $casestudy= CaseStudy::find(2);
      return view('sandbox.autosave', compact('casestudy'));
    }


    public function update(Request $request, $id){

        $cs= CaseStudy::find($id);
        //$user->name= $request->name;
        $cs->update($request->except('is_admin'));
        $cs->save();


        Log::info('Autosaving:'.print_r( $request->all(), TRUE));

        if ($request->isMethod('post')){
            return response()->json(['response' => 'This is post method']);
        }

        return response()->json(['response' => 'This is get method']);


      /*
      return response()->json([
          'name' => 'Luke',
          'state' => 'CA'
      ]);
      */
    }
}
