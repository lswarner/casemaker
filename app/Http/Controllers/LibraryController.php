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

    $keywords= Keyword::all_sorted()->pluck('keyword', 'id');
    $method_suggestions= Method::all_sorted();
    $keyword_suggestions= Keyword::all_sorted();

    //$country_suggestions= json_encode($this->country_suggestions);

    return view('casestudy.masonry', compact('casestudies', 'country_suggestions', 'method_suggestions', 'keyword_suggestions') );
  }
}
