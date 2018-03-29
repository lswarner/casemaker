<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CMS extends Model
{
    protected $table= "cms";
    protected $guarded= [];
    private $excluded= ['logo', 'background', 'id', 'created_at', 'updated_at'];

    public function getStylesheetUrlAttribute(){
      //return Storage::disk('assets')->url("assets/sass/_custom_variables.scss");
      return resource_path("assets/sass/_custom_variables.scss");
    }

    public function generateStylesheet(){

      $file= fopen($this->stylesheet_url, 'w');

      $stylesheet_attributes= collect($this->getAttributes())->except($this->excluded);

      $stylesheet_attributes->each(function($item, $key) use ($file){
        fwrite($file, "\$".$key.": ".$item.";\n");
        //echo '$'.$key.': '.$item.'\n';
      });

      fclose($file);
    }


}
