<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructions;
use Session;

class InstructionsController extends Controller
{

    public function edit(){
      $instructions = Instructions::first();
      return view('instructions', compact('instructions'));
    }


    public function update(Request $request){

      $instructions = Instructions::first();

      $data= $request->all();
      foreach($data as $k=>$v){
        if( empty($v) ) $data[$k]= " ";
      }

      $instructions->update($data);
      $instructions->save();

      Session::flash('message', 'The instructions were updated.');
      Session::flash('alert-class', 'flash-urc');

      return redirect()->route('instructions');
    }
}
