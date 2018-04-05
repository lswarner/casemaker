<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMS;
use Artisan;

class CMSController extends Controller
{
    //
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



    //function edit image resource

    // function upload image resource
}
