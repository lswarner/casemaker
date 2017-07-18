<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Keyword;
use App\Method;
use App\User;
use Auth;
use Session;

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
        $created= CaseStudy::in_progress()->get();
        $submitted= CaseStudy::submitted()->get();
        $published= CaseStudy::published()->get();

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

        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.show', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
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
    public function edit_methodology(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.methodology', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_results(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.results', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_implications(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.implications', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function review(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');

        return view('casestudy.review', ['casestudy'=>$caseStudy, 'keywords'=>$keywords] );
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
        $data=  $request->except('destination', 'keywords') ;

        //make sure title is never null, cause that makes the db angry
        if( empty($data['title'])){
          $data['title']= "";
        }

        $caseStudy->update($data);

        //$caseStudy->keywords()->sync($request->keywords); // SYNC only the selected keywords to the casestudy

        $caseStudy->save();

        return response()->json(['response' => 'CaseStudy #'.$caseStudy->id.' updated was successful.']);
        /*
         * don't use destination or redirection -
         *    we are responding ONLY to AJAX posts, so send
         *    a JSON response instead.


        //get the next destination, or intro if empty
        $destination= $request->input('destination', 'introduction');

        return redirect()->route($destination, $caseStudy);
        */
    }


    /**
     * Submit the specified resource
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, CaseStudy $caseStudy){

      $caseStudy->status= "submitted";
      $caseStudy->submitted_at= \Carbon\Carbon::now();
      $caseStudy->save();


  		Session::flash('message', 'Your case study has been submitted.');
  		Session::flash('alert-class', 'flash-success');

      return redirect()->route('home');
    }



    /**
     * Publish the specified resource
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, CaseStudy $caseStudy){

      $caseStudy->status= "published";
      $caseStudy->published_at= \Carbon\Carbon::now();
      $caseStudy->save();

      Session::flash('message', "This case study is Live.");
      Session::flash('alert-class', 'flash-success');

      return redirect()->route('admin');
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
