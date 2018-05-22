<?php

use Illuminate\Database\Seeder;

class DemoCaseStudies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         method 1-4
         keywords 1- 6
         audience 1-4
         thematic 1-2
         */

         $m1=App\Method::find(1);
         $m2=App\Method::find(2);
         $m3=App\Method::find(3);
         $m4=App\Method::find(4);

         $k1=App\Keyword::find(1);
         $k2=App\Keyword::find(2);
         $k3=App\Keyword::find(3);
         $k4=App\Keyword::find(4);
         $k5=App\Keyword::find(5);
         $k6=App\Keyword::find(6);

         $a1=App\Audience::find(1);
         $a2=App\Audience::find(2);
         $a3=App\Audience::find(3);
         $a4=App\Audience::find(4);

         $t1=App\Thematic::find(1);
         $t2=App\Thematic::find(2);

          /**************************************************************
          $data= [
            'title' => 'Household Air Polution',
            'countries' => 'Bangladesh, Rwanda',
          ];
          $cs= App\CaseStudy::create($data);

          $cs->methods()->attach($m4);
          $cs->keywords()->attach($k4);
          $cs->keywords()->attach($k6);
          $cs->status="demo";
          $cs->save();



         /**************************************************************/
         $data= [
           'title' => 'Coffee: An Economic Stimulant',
           'countries' => '<p>Guatemala, Burundi, Malaysia</p>',
         ];
         $cs= App\CaseStudy::create($data);

         $cs->methods()->attach($m3);
         $cs->keywords()->attach($k1);
         $cs->keywords()->attach($k2);
         $cs->status="demo";
         $cs->save();




         /**************************************************************/
         $data= [
           'title' => 'Starting from the Bottom',
           'countries' => '<p>Bangladesh, Senegal, Honduras</p>',
         ];
         $cs= App\CaseStudy::create($data);

         $cs->methods()->attach($m1);
         $cs->methods()->attach($m2);
         $cs->keywords()->attach($k3);
         $cs->keywords()->attach($k6);
         $cs->status="demo";
         $cs->save();



         /**************************************************************/
         $data= [
           'title' => 'Mobile Technology for maternal health',
           'countries' => '<p>Bangladesh</p>',
         ];
         $cs= App\CaseStudy::create($data);

         $cs->methods()->attach($m4);
         $cs->keywords()->attach($k2);
         $cs->keywords()->attach($k4);
         $cs->keywords()->attach($k5);
         $cs->status="demo";
         $cs->save();



         /**************************************************************/
         $data= [
           'title' => 'Lessons in Country Engagement',
           'countries' => '<p>Guatemala, Burundi</p>',
         ];
         $cs= App\CaseStudy::create($data);

         $cs->methods()->attach($m2);
         $cs->methods()->attach($m3);
         $cs->keywords()->attach($k1);
         $cs->keywords()->attach($k5);
         $cs->status="demo";
         $cs->save();



        /**************************************************************/
        $data= [
          'title' => 'Using Evidence to Scale',
          'countries' => '<p>Burundi, Rwanda, Tanzania</p>',
        ];
        $cs= App\CaseStudy::create($data);

        $cs->methods()->attach($m1);
        $cs->methods()->attach($m4);
        $cs->keywords()->attach($k2);
        $cs->keywords()->attach($k3);
        $cs->status="demo";
        $cs->save();


        /**************************************************************/
        $data= [
          'title' => 'Lessons in translating reasearch into action',
          'countries' => '<p>Senegal</p>',
        ];
        $cs= App\CaseStudy::create($data);

        $cs->methods()->attach($m2);
        $cs->keywords()->attach($k1);
        $cs->keywords()->attach($k3);
        $cs->status="demo";
        $cs->save();

    }
}
