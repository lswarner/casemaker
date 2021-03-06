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
use App\Template;

class LibraryController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $casestudies= CaseStudy::published()->get();

    //$keywords= Keyword::all_sorted()->pluck('keyword', 'id');
    $methods= Method::all_sorted();
    $keywords= Keyword::all_sorted();
    $thematics= Thematic::all_sorted();
    $audiences= Audience::all_sorted();


    $cms= CMS::firstOrCreate([]);
    if(empty($cms)){
      $cms= new CMS;
    }


    $countries= $cms->active_countries;

    $status= 'production';

    return view('library.masonry', compact('casestudies', 'countries', 'methods', 'keywords', 'thematics', 'audiences', 'cms', 'status') );
  }




public function demo()
{

    $casestudies= CaseStudy::where('status', 'demo')->get();

    //$keywords= Keyword::all_sorted()->pluck('keyword', 'id');
    $methods= Method::all_sorted();
    $keywords= Keyword::all_sorted();
    $thematics= Thematic::all_sorted();
    $audiences= Audience::all_sorted();


    $cms= CMS::firstOrCreate([]);
    if(empty($cms)){
      $cms= new CMS;
    }


    $countries= $cms->active_countries;


    $status ='demo';

    return view('library.masonry', compact('casestudies', 'countries', 'methods', 'keywords', 'thematics', 'audiences', 'cms', 'status') );
  }




  public function display(CaseStudy $caseStudy){
    $instructions= Instructions::first();

    $template= Template::first();
    if(is_null($caseStudy->template()) == FALSE){
      $template= $caseStudy->template();
    }
    $template_blade= 'library.templates.'.$template->blade;

    return view($template_blade, ['casestudy'=>$caseStudy, 'instructions'=>$instructions]);
  }


  public function about(){
    $cms= CMS::firstOrCreate([]);
    if(empty($cms)){
      $cms= new CMS;
    }

    return view('library.about', ['cms'=>$cms]);
  }
}
