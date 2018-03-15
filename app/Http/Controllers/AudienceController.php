<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audience;

use Validator;
use Session;

class AudienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiences= Audience::all_sorted();
        return view('audience.create', compact('audiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('audience.index');
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
          'name' => 'required|unique:audiences,name|max:255',
          'description' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('audience/create')
                      ->withErrors($validator)
                      ->withInput();
      }


      $audience= new Audience;
      $audience->name= $request->name;
      $audience->description= $request->description;
      $audience->save();

      Session::flash('message', 'The new intended audience \''.$audience->name.'\' was added.');
      Session::flash('alert-class', 'flash-urc');


      return redirect()->route('audience.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Audience $audience)
    {
        return redirect()->route('audience.edit', compact('audience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Audience $audience)
    {
        $casestudies= collect([]);
        return view('audience.edit', compact('casestudies', "audience"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audience $audience)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|unique:audiences,name|max:255',
          'description' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('audience/edit')
                      ->withErrors($validator)
                      ->withInput();
      }

      $audience= new Audience;
      $audience->name= $request->name;
      $audience->description= $request->description;
      $audience->save();

      Session::flash('message', 'The intended audience \''.$audience->name.'\' was changed.');
      Session::flash('alert-class', 'flash-urc');


      return redirect()->route('audience.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
