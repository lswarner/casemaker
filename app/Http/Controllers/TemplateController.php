<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

use Validator;
use Session;

class TemplateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $templates= Template::all_sorted();
      return view('template.create', compact('templates'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return redirect()->route('template.index');
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
        'name' => 'required|unique:templates,name|max:255',
        'blade' => 'required|max:255',
        'description' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('template/create')
                    ->withErrors($validator)
                    ->withInput();
    }


    $template= new Template;
    $template->name= $request->name;
    $template->blade= $request->blade;
    $template->image= "";
    $template->description= $request->description;
    $template->save();

    Session::flash('message', 'The new Template area \''.$template->name.'\' was added.');
    Session::flash('alert-class', 'flash-urc');


    return redirect()->route('template.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Template $template)
  {
      return redirect()->route('template.edit', compact('template'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Template $template)
  {
      $casestudies= collect([]);
      return view('template.edit', compact('casestudies', "template"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Template $template)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:templates,name,'.$template->id.'|max:255',
        'blade' => 'required|max:255',
        'description' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('template/'.$template->id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
    }

    $template->name= $request->name;
    $template->blade= $request->blade;
    $template->description= $request->description;
    $template->image= "";
    $template->save();

    Session::flash('message', 'The Template area \''.$template->name.'\' was changed.');
    Session::flash('alert-class', 'flash-urc');


    return redirect()->route('template.index');
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
