<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaseStudy;
use App\Keyword;
use App\Method;
use App\Thematic;
use App\Audience;

class LibraryController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $casestudies= CaseStudy::all();

    //$keywords= Keyword::all_sorted()->pluck('keyword', 'id');
    $methods= Method::all_sorted();
    $keywords= Keyword::all_sorted();
    $thematics= Thematic::all_sorted();
    $audiences= Audience::all_sorted();

    //$country_suggestions= json_encode($this->country_suggestions);
    $countries= ['Bangladesh', 'Tanzania', 'Paraguay'];

    return view('casestudy.masonry', compact('casestudies', 'countries', 'methods', 'keywords', 'thematics', 'audiences') );
  }
}
