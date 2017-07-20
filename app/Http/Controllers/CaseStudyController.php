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

  protected $country_suggestions;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');

        $this->country_suggestions= array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
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
        $team_suggestions= User::all_sorted()->pluck('name');

        return view('casestudy.introduction', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => json_encode($team_suggestions)
                                            ] );
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
        $team_suggestions= User::all_sorted()->pluck('name');

        return view('casestudy.methodology', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => json_encode($team_suggestions)
                                            ] );
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
        $team_suggestions= User::all_sorted()->pluck('name');

        return view('casestudy.results', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => json_encode($team_suggestions) 
                                            ] );
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
        $team_suggestions= User::all_sorted()->pluck('name');

        return view('casestudy.implications', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => json_encode($team_suggestions)
                                            ] );
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

        return view('casestudy.review', ['casestudy'=>$caseStudy, 'keywords'=>$keywords, 'country_suggestions' => json_encode($this->country_suggestions) ] );
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
