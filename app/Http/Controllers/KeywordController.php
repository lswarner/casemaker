<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;

use Validator;
use Session;

class KeywordController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords= Keyword::all_sorted();

        return view('topic.create', compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('topic.index');
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
            'keyword' => 'required|unique:keywords,keyword|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('keyword/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $keyword= new Keyword;
        $keyword->keyword= $request->keyword;
        $keyword->save();

        Session::flash('message', 'The new keyword \''.$keyword->keyword.'\' was added.');
        Session::flash('alert-class', 'flash-urc');


        return redirect()->route('topic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function show(Keyword $keyword)
    {
        return redirect()->route('topic.edit', $keyword);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $keyword)
    {
        $casestudies= collect([]);

        return view('topic.edit', compact('casestudies', 'keyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keyword $keyword)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|unique:keywords,keyword,'.$keyword->id.'|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('keyword/'.$keyword->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $keyword->keyword= $request->keyword;
        $keyword->save();

        Session::flash('message', 'The keyword \''.$keyword->keyword.'\' was changed.');
        Session::flash('alert-class', 'flash-urc');


        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword)
    {
        //
    }
}
