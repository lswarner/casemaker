<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Keyword;
use App\Method;
use App\Audience;
use App\Thematic;
use App\User;
use App\Invitation;
use App\Attachment;
use App\CMS;
use App\Template;
use Auth;
use Session;
use Image;

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

        return redirect()->route('background', $cs);
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


        $attachments["introduction"]= $caseStudy->attachments()->section('introduction')->get();
        $attachments["methodology"]= $caseStudy->attachments()->section('methodology')->get();
        $attachments["results"]= $caseStudy->attachments()->section('results')->get();
        $attachments["implications"]= $caseStudy->attachments()->section('implications')->get();

        $templates= Template::all_sorted();

        return view('casestudy.show', ['casestudy'=>$caseStudy, 'keywords'=>$keywords, 'attachments'=>$attachments, 'templates'=>$templates] );
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
        //the background page is the front page.
        return redirect()->route('background', $caseStudy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_background(CaseStudy $caseStudy)
    {
        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');
        $team_suggestions= User::all_sorted()->diff($caseStudy->team);
        $method_suggestions= Method::all_sorted()->diff($caseStudy->methods);
        $keyword_suggestions= Keyword::all_sorted()->diff($caseStudy->keywords);
        $audience_suggestions= Audience::all_sorted()->diff($caseStudy->audiences);
        $thematic_suggestions= Thematic::all_sorted()->diff($caseStudy->thematics);
        $attachments= $caseStudy->attachments()->section('introduction')->get();

        return view('casestudy.background', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => $team_suggestions,
                                                'method_suggestions' => $method_suggestions,
                                                'keyword_suggestions' => $keyword_suggestions,
                                                'audience_suggestions' => $audience_suggestions,
                                                'thematic_suggestions' => $thematic_suggestions,
                                                'attachments' => $attachments
                                            ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_approach(CaseStudy $caseStudy)
    {

        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');
        $team_suggestions= User::all_sorted()->diff($caseStudy->team);
        $method_suggestions= Method::all_sorted()->diff($caseStudy->methods);
        $keyword_suggestions= Keyword::all_sorted()->diff($caseStudy->keywords);
        $audience_suggestions= Audience::all_sorted()->diff($caseStudy->audiences);
        $thematic_suggestions= Thematic::all_sorted()->diff($caseStudy->thematics);
        $attachments= $caseStudy->attachments()->section('methodology')->get();

        return view('casestudy.approach', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => $team_suggestions,
                                                'method_suggestions' => $method_suggestions,
                                                'keyword_suggestions' => $keyword_suggestions,
                                                'audience_suggestions' => $audience_suggestions,
                                                'thematic_suggestions' => $thematic_suggestions,
                                                'attachments' => $attachments
                                            ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit_findings(CaseStudy $caseStudy)
    {

        $keywords= Keyword::all_sorted()->pluck('keyword', 'id');
        $team_suggestions= User::all_sorted()->diff($caseStudy->team);
        $method_suggestions= Method::all_sorted()->diff($caseStudy->methods);
        $keyword_suggestions= Keyword::all_sorted()->diff($caseStudy->keywords);
        $audience_suggestions= Audience::all_sorted()->diff($caseStudy->audiences);
        $thematic_suggestions= Thematic::all_sorted()->diff($caseStudy->thematics);
        $attachments= $caseStudy->attachments()->section('results')->get();

        return view('casestudy.findings', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => $team_suggestions,
                                                'method_suggestions' => $method_suggestions,
                                                'keyword_suggestions' => $keyword_suggestions,
                                                'audience_suggestions' => $audience_suggestions,
                                                'thematic_suggestions' => $thematic_suggestions,
                                                'attachments' => $attachments
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
        $team_suggestions= User::all_sorted()->diff($caseStudy->team);
        $method_suggestions= Method::all_sorted()->diff($caseStudy->methods);
        $keyword_suggestions= Keyword::all_sorted()->diff($caseStudy->keywords);
        $audience_suggestions= Audience::all_sorted()->diff($caseStudy->audiences);
        $thematic_suggestions= Thematic::all_sorted()->diff($caseStudy->thematics);
        $attachments= $caseStudy->attachments()->section('implications')->get();

        return view('casestudy.implications', [ 'casestudy'=>$caseStudy,
                                                'keywords'=>$keywords,
                                                'country_suggestions' => json_encode($this->country_suggestions),
                                                'team_suggestions' => $team_suggestions,
                                                'method_suggestions' => $method_suggestions,
                                                'keyword_suggestions' => $keyword_suggestions,
                                                'audience_suggestions' => $audience_suggestions,
                                                'thematic_suggestions' => $thematic_suggestions,
                                                'attachments' => $attachments
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
        $team_suggestions= User::all_sorted()->diff($caseStudy->team);
        $method_suggestions= Method::all_sorted()->diff($caseStudy->methods);
        $keyword_suggestions= Keyword::all_sorted()->diff($caseStudy->keywords);
        $audience_suggestions= Audience::all_sorted()->diff($caseStudy->audiences);
        $thematic_suggestions= Thematic::all_sorted()->diff($caseStudy->thematics);

        $attachments["introduction"]= $caseStudy->attachments()->section('introduction')->get();
        $attachments["methodology"]= $caseStudy->attachments()->section('methodology')->get();
        $attachments["results"]= $caseStudy->attachments()->section('results')->get();
        $attachments["implications"]= $caseStudy->attachments()->section('implications')->get();

        $templates= Template::all_sorted();

        return view('casestudy.review', [ 'casestudy'=>$caseStudy,
                                          'keywords'=>$keywords,
                                          'country_suggestions' => json_encode($this->country_suggestions),
                                          'team_suggestions' => $team_suggestions,
                                          'method_suggestions' => $method_suggestions,
                                          'keyword_suggestions' => $keyword_suggestions,
                                          'audience_suggestions' => $audience_suggestions,
                                          'thematic_suggestions' => $thematic_suggestions,
                                          'attachments' => $attachments,
                                          'templates' => $templates,
                                       ] );
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

        //make sure author is never null, cause that makes the db angry
        if( empty($data['author'])){
          $data['author']= "";
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
        $destination= $request->input('destination', 'background');

        return redirect()->route($destination, $caseStudy);
        */
    }


    /**
     * Upload a file to the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, CaseStudy $caseStudy)
    {
        $section ="";
        if( $request->hasFile('attachment') && $request->file('attachment')->isValid() ) {
          $file=  $request->file('attachment') ;
          $section = $request->input('section', 'background');

          $path= $file->store('uploads', 'local');

          $attachment= new \App\Attachment;
          $attachment->path = $path;
          $attachment->original_name = $file->getClientOriginalName();
          $attachment->section= $section;

          $caseStudy->attachments()->save($attachment);
        }

        switch($section){
          case "introduction":
            $page= "background";
            break;
          case "methodology":
            $page= "approach";
            break;
          case "results":
            $page= "findings";
            break;
          case "implications":
            $page= "implications";
            break;
          default:
            $page= "introduction";
        }


        return redirect()->route($page, $caseStudy);

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

      $template_id= $request->input('template');
      $template= Template::find($template_id);
      if(is_null($template) == FALSE){
        $template->casestudies()->save($caseStudy);
      }
      $caseStudy->save();


      //generate an updated list of new countries, including from the newly published casestudy
      CMS::first()->generateActiveCountries();


      //create a slug
      /*  NOT FUNCTIONING - gave up on route model binding with slug for now. */
      //$slug= str_slug($caseStudy->title);


      Session::flash('message', "This case study is Live.");
      Session::flash('alert-class', 'flash-success');

      return redirect()->route('admin');
    }


    /**
     * Re-open the case study
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function reopen(Request $request, CaseStudy $caseStudy){

      $caseStudy->status= "created";
      $caseStudy->submitted_at= null;
      $caseStudy->save();

      //generate an updated list of new countries sice we may have un-published a case study
      CMS::first()->generateActiveCountries();

      Session::flash('message', "This case study has been re-opened for further updates.");
      Session::flash('alert-class', 'flash-success');

      return redirect()->route('background', $caseStudy);
    }


    /**
     * Add a member to this casestudy's team
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function team_add(Request $request, CaseStudy $caseStudy){

      $new_member= $request->input('add-user_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->team()->attach($new_member);

        return response()->json(['response' => 'Team Member #'.$new_member.' was added to the team.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to add member to team'], $status);
      }

    }



    /**
     * Remove a member from this casestudy's team
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function team_remove(Request $request, CaseStudy $caseStudy){

      $remove_member= $request->input('remove-user_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->team()->detach($remove_member);

        return response()->json(['response' => 'Team Member #'.$remove_member.' was removed from the team.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to remove member from team'], $status);
      }

    }




    /**
     * Invite a member to join casestudy's team
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function invite(Request $request, CaseStudy $caseStudy){

      //dd($request);


      $this->validate($request, [
          'email' => 'required|email'
      ]);

      $email= $request->input('email');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){

        //check if this email has already been invited to this case study
        if( Invitation::withEmail($email)->get()->contains('case_study_id', $caseStudy->id) == true ){
          $status= '400'; //bad request
          return response()->json(['error' => 'This email has already been invited to this case study'], $status);
        }

        if( User::all()->contains('email', $email) ){
            $status= '409'; //conflict
            return response()->json(['error' => 'This email belongs to a registered user.'], $status);
        }


        $u= User::find($user);

        $i= new Invitation;
        $i->email= $email;
        $i->save();
        $u->invitations()->save($i);
        $caseStudy->invitations()->save($i);

        $i->notify(new \App\Notifications\TeamInvitation);

        return response()->json(['response' => $email.' was invited to join your team.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to invite a new person.'], $status);
      }
    }


    /**
     * Add a method to this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function method_add(Request $request, CaseStudy $caseStudy){

        $method= $request->input('method_id');
        $user= $request->input('user_id');

        if($caseStudy->team->contains($user) == TRUE){
          $caseStudy->methods()->attach($method);

          return response()->json(['response' => 'Method #'.$method.' was add from the case study.']);
        }
        else {
          $status= '401'; //unauthorized
          return response()->json(['error' => 'Invalid permission to add method from case study'], $status);
        }
    }

    /**
     * Remove a method from this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function method_remove(Request $request, CaseStudy $caseStudy){

      $method= $request->input('method_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->methods()->detach($method);

        return response()->json(['response' => 'Method #'.$method.' was removed from the case study.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to remove method from case study'], $status);
      }
    }


    /**
     * Add a keyword to this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function keyword_add(Request $request, CaseStudy $caseStudy){

        $keyword= $request->input('keyword_id');
        $user= $request->input('user_id');

        if($caseStudy->team->contains($user) == TRUE){
          $caseStudy->keywords()->attach($keyword);

          return response()->json(['response' => 'keyword #'.$keyword.' was add from the case study.']);
        }
        else {
          $status= '401'; //unauthorized
          return response()->json(['error' => 'Invalid permission to add keyword from case study'], $status);
        }
    }

    /**
     * Remove a keyword from this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function keyword_remove(Request $request, CaseStudy $caseStudy){

      $keyword= $request->input('keyword_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->keywords()->detach($keyword);

        return response()->json(['response' => 'keyword #'.$keyword.' was removed from the case study.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to remove keyword from case study'], $status);
      }
    }








    /**
     * Add an intended audience to this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function audience_add(Request $request, CaseStudy $caseStudy){

        $audience= $request->input('audience_id');
        $user= $request->input('user_id');

        if($caseStudy->team->contains($user) == TRUE){
          $caseStudy->audiences()->attach($audience);

          return response()->json(['response' => 'Audience #'.$audience.' was add from the case study.']);
        }
        else {
          $status= '401'; //unauthorized
          return response()->json(['error' => 'Invalid permission to add audience from case study'], $status);
        }
    }

    /**
     * Remove an intended audience from this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function audience_remove(Request $request, CaseStudy $caseStudy){

      $audience= $request->input('audience_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->audiences()->detach($audience);

        return response()->json(['response' => 'Audience #'.$audience.' was removed from the case study.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to remove audience from case study'], $status);
      }
    }






    /**
     * Add a thematic area to this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function thematic_add(Request $request, CaseStudy $caseStudy){

        $thematic= $request->input('thematic_id');
        $user= $request->input('user_id');

        if($caseStudy->team->contains($user) == TRUE){
          $caseStudy->thematics()->attach($thematic);

          return response()->json(['response' => 'thematic #'.$thematic.' was add from the case study.']);
        }
        else {
          $status= '401'; //unauthorized
          return response()->json(['error' => 'Invalid permission to add thematic from case study'], $status);
        }
    }

    /**
     * Remove a thematic area from this casestudy
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function thematic_remove(Request $request, CaseStudy $caseStudy){

      $thematic= $request->input('thematic_id');
      $user= $request->input('user_id');

      if($caseStudy->team->contains($user) == TRUE){
        $caseStudy->thematics()->detach($thematic);

        return response()->json(['response' => 'thematic #'.$thematic.' was removed from the case study.']);
      }
      else {
        $status= '401'; //unauthorized
        return response()->json(['error' => 'Invalid permission to remove thematic from case study'], $status);
      }
    }








    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseStudy $caseStudy)
    {
        $user= Auth::user();
        if($user->is_admin == true || $caseStudy->team->contains('id', $user->id) ){

          $caseStudy->delete();

          Session::flash('message', 'Your case study has been deleted.');
      		Session::flash('alert-class', 'flash-success');

          return redirect()->route('home');
        }
        else {
          Session::flash('message', 'You don\'t have permission to delete this case study.');
      		Session::flash('alert-class', 'flash-danger');

          return response()->redirect('background', $caseStudy);
        }
    }




    public function attachment(CaseStudy $caseStudy, Attachment $attachment){
      $attachment->path;
      return response()->file(storage_path( 'app/'. $attachment->path) );
    }





    public function edit_featured(CaseStudy $caseStudy){

      return view('casestudy.featured', [ 'casestudy'=>$caseStudy ]);
    }

    public function update_featured(CaseStudy $caseStudy, Request $request){
      if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

      //if ($request->hasFile('attachment') ) {


        $uploaded_file= $request->file('attachment');


        $image= Image::make($uploaded_file);


        $upload_folder= "img/cs/";

        //$file_name= $uploaded_file->getClientOriginalName();
        $file_name= 'casestudy'.$caseStudy->id.'.'.$uploaded_file->getClientOriginalExtension();

        $max_width= 1400;


        if($image->width() > $max_width){
          $image->resize($max_width, null, function ($constraint) {
              $constraint->aspectRatio();
          });
        }

        $file_path= $upload_folder.$file_name;

        \Log::info('upload featured image: saving photo to fileserver');
        $image->save(public_path($file_path), 100);

        $caseStudy->featured_image= $file_path;
        $caseStudy->save();

      }


      return redirect()->route('background', $caseStudy);
    }
}
