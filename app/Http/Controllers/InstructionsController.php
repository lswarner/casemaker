<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructions;

class InstructionsController extends Controller
{

    public function edit(){
      $instructions = Instructions::first();
      return view('instructions', compact('instructions'));
    }


    public function update(Request $request){

      $instructions = Instructions::first();

      $instructions->update($request->all());
      $instructions->save();

      Session::flash('message', 'The instructions were updated.');
      Session::flash('alert-class', 'flash-urc');

      return redirect()->route('instructions');
    }
}
