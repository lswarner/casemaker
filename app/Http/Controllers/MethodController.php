<?php

namespace App\Http\Controllers;

use App\Method;
use Illuminate\Http\Request;

use Validator;
use Session;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $methods= Method::all_sorted();

      return view('method.create', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('method.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|unique:methods,name|max:255',
          'description' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('method/create')
                      ->withErrors($validator)
                      ->withInput();
      }


      $method= new Method;
      $method->name= $request->name;
      $method->description= $request->description;
      $method->save();

      Session::flash('message', 'The new method \''.$method->name.'\' was added.');
      Session::flash('alert-class', 'flash-urc');


      return redirect()->route('method.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        return redirect()->route('method.edit', $method);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
      $casestudies= collect([]);

      return view('method.edit', compact('casestudies', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|unique:methods,name,'.$method->id.'|max:255',
          'description' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('method/'.$method->id.'/edit')
                      ->withErrors($validator)
                      ->withInput();
      }

      $method->name= $request->name;
      $method->description= $request->description;
      $method->save();

      Session::flash('message', 'The method \''.$method->name.'\' was changed.');
      Session::flash('alert-class', 'flash-urc');


      return redirect()->route('method.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        //
    }
}
