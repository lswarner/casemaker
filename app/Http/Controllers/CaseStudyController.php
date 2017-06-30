<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Keyword;
use App\Method;
use App\User;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests\CaseStudyRequest;

class CaseStudyController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created= CaseStudy::all();
        $submitted= CaseStudy::all();
        $published= CaseStudy::all();

        return view('casestudy.index', compact('created', 'submitted', 'published'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('casestudy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //create an empty casestudy
        $cs= new CaseStudy;
        $cs->save();

        $cs->team()->attach( Auth::user() );

        return redirect()->route('introduction', $cs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function show(CaseStudy $caseStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseStudy $caseStudy)
    {
        //we don't actually use the general edit route-
        //the introduction page is the front page.
        return redirect()->route('introduction', $caseStudy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_introduction(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.introduction', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_methods(CaseStudy $caseStudy)
    {
        return view('casestudy.introduction', ['casestudy'=>$caseStudy] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_results(CaseStudy $caseStudy)
    {
        return view('casestudy.introduction', ['casestudy'=>$caseStudy] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_implications(CaseStudy $caseStudy)
    {
        return view('casestudy.introduction', ['casestudy'=>$caseStudy] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_review(CaseStudy $caseStudy)
    {
        return view('casestudy.introduction', ['casestudy'=>$caseStudy] );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseStudy $caseStudy)
    {

        $caseStudy->update( $request->except('destination', 'keywords') );

        $caseStudy->keywords()->sync($request->keywords); // SYNC only the selected keywords to the casestudy

        $caseStudy->save();


        //get the next destination, or intro if empty
        $destination= $request->input('destination', 'introduction');

        return redirect()->route($destination, $caseStudy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseStudy $caseStudy)
    {
        //
    }
}
