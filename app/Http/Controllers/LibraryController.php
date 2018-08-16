<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaseStudy;
use App\Keyword;
use App\Method;
use App\Thematic;
use App\Audience;
use App\CMS;
use App\Instructions;

class LibraryController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $casestudies= CaseStudy::where('status', 'demo')->get();

    //$keywords= Keyword::all_sorted()->pluck('keyword', 'id');
    $methods= Method::all_sorted();
    $keywords= Keyword::all_sorted();
    $thematics= Thematic::all_sorted();
    $audiences= Audience::all_sorted();

    //$country_suggestions= json_encode($this->country_suggestions);
    $countries= ['Bangladesh', 'Burundi', 'Honduras', 'Rwanda', 'Senegal', 'Tanzania'];

    $cms= CMS::firstOrCreate([]);
    if(empty($cms)){
      $cms= new CMS;
    }

    return view('casestudy.masonry', compact('casestudies', 'countries', 'methods', 'keywords', 'thematics', 'audiences', 'cms') );
  }




  public function display(CaseStudy $caseStudy){
    $instructions= Instructions::first();



    return view('casestudy.templates.basic', ['casestudy'=>$caseStudy, 'instructions'=>$instructions]);
  }
}
