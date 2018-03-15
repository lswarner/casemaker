<?php

use Illuminate\Database\Seeder;

class InstructionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // call with artisan db:seeder --class="InstructionsSeeder"

      DB::table('instructions')->insert([
          'intro0' => "",
          'intro1' => "",
          'introh1' => "Challenge and Intervention Background",
          'intro2' => "",
          'introh2' => "Additional Contextual Background",

          'method0' => "",
          'method1' => "",
          'methodh1' => "Case Study Methods",
          'method2' => "",
          'methodh2' => "Featured Implementation Research Study Methods",


          'results0' => "",
          'results1' => "",
          'resultsh1' => "Discuss the results of this case study.",


          'implications0' => "",
          'implications1' => "",
          'implicationsh1' => "Discuss the implications of this case study.",
          'implications2' => "",
          'implicationsh2' => "Use this box to list any references cited in the text of your case study. Please follow the <a href='https://owl.english.purdue.edu/owl/resource/1017/01/'>AMA Citation style</a>.",
      ]);
    }
}
