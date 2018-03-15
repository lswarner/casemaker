<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thematic;

use Validator;
use Session;

class ThematicController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $thematics= Thematic::all_sorted();
      return view('thematic.create', compact('thematics'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return redirect()->route('thematic.index');
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
        'name' => 'required|unique:thematics,name|max:255',
        'description' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('thematic/create')
                    ->withErrors($validator)
                    ->withInput();
    }


    $thematic= new Thematic;
    $thematic->name= $request->name;
    $thematic->description= $request->description;
    $thematic->save();

    Session::flash('message', 'The new thematic area \''.$thematic->name.'\' was added.');
    Session::flash('alert-class', 'flash-urc');


    return redirect()->route('thematic.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Thematic $thematic)
  {
      return redirect()->route('thematic.edit', compact('thematic'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Thematic $thematic)
  {
      $casestudies= collect([]);
      return view('thematic.edit', compact('casestudies', "thematic"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Thematic $thematic)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:thematics,name,'.$thematic->id.'|max:255',
        'description' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('thematic/'.$thematic->id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
    }

    $thematic->name= $request->name;
    $thematic->description= $request->description;
    $thematic->save();

    Session::flash('message', 'The thematic area \''.$thematic->name.'\' was changed.');
    Session::flash('alert-class', 'flash-urc');


    return redirect()->route('thematic.index');
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
