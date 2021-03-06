<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMS;
use Artisan;
use Image;
use Storage;

class CMSController extends Controller
{
    public function style(){
      $cms= CMS::firstOrCreate([]);
      if(empty($cms)){
        $cms= new CMS;
      }

      return view('cms.style', compact('cms'));
    }


    public function style_update(Request $request){
      $cms= CMS::first();

      $cms->update($request->all());
      $cms->save();

      //write new custom style to file
      try {
        $cms->generateStylesheet();
      }
      catch(Exception $ex){

      }

      exec('npm run dev');
      /*
      //run sass through npm
      $output= Artisan::call('compile:sass', ['env' => 'dev']);

      $output= Artisan::call('route:list');
      dd($output);

*/
      return redirect()->route('style');
    }




    public function branding(){
      $cms= CMS::firstOrCreate([]);
      if(empty($cms)){
        $cms= new CMS;
      }

      return view('cms.branding', compact('cms'));
    }


    public function branding_update(Request $request){
      $cms= CMS::first();

      $cms->update($request->all());
      $cms->save();


      return redirect()->route('branding');
    }


    //function edit image resource
    /**
  	 * Show the form for creating a new resource.
  	 *
  	 * @return Response
  	 */
  	public function edit_image($field) {
    		// access this field using: $this->attributes[$field];

       $cms= CMS::first();
       $image= $cms->$field;


  		return view('cms.image', compact('image', 'cms', 'field'));
  	}





    // function upload image resource
    public function update_image(Request $request, $field){

      $cms= CMS::first();


      if( $field == 'favicon') {

        $file=  $request->file('attachment');

        $path= Storage::disk('public_uploads')->put('img/', $file);

        $cms->$field= $path;
        $cms->save();


        return redirect()->route('branding');
        exit;

      }



/*
      $messages = [
        'attachment.max' => 'Please choose an image that is less than 5 MB.',
      ];

      $this->validate($request, [
          'attachment' => 'image|max:5000|required'		/* 5 MB
      ]);

*/


      if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

      //if ($request->hasFile('attachment') ) {


        $uploaded_file= $request->file('attachment');


        $image= Image::make($uploaded_file);


        $upload_folder= "img/";

        $file_name= $uploaded_file->getClientOriginalName();

        switch($field){
          case 'casemaker_logo':
          case 'library_logo':
            $max_width= 420;
            break;
          case 'splash_image':
            $max_width= 2000;
            break;
          case 'library_splash':
            $max_width= 1400;
            break;
          default:
            $max_width= 420;
        }

        if($image->width() > $max_width){
          $image->resize($max_width, null, function ($constraint) {
              $constraint->aspectRatio();
          });
        }

        $file_path= $upload_folder.$file_name;

        \Log::info('upload photo: saving photo to fileserver');
        $image->save(public_path($file_path), 100);

        $cms->$field= $file_path;
        $cms->save();

      }


      return redirect()->route('branding');

    }
}
