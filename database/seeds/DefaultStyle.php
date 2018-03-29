<?php

use Illuminate\Database\Seeder;

class DefaultStyle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $style= App\CMS::firstOrCreate([]);

        $style->update([
          'primary-bg' =>'#135693',
          'primary-text' => '#ffffff',
          'primary-hover-bg' =>'#6BC7FF',
          'primary-hover-text' => '#ffffff',

          'secondary-bg' =>'#2699FF',
          'secondary-text' => '#ffffff',
          'secondary-hover-bg' =>'#51a4ff',
          'secondary-hover-text' => '#ffffff',

          'info-bg' =>'#6BC7FF',
          'info-text' => '#ffffff',
          'info-hover-bg' =>'#5ba9d9',
          'info-hover-text' => '#ffffff',

          'accent1-bg' =>'#FF3821',
          'accent1-text' => '#ffffff',
          'accent1-hover-bg' =>'#F79917',
          'accent1-hover-text' => '#ffffff',

          'accent2-bg' =>'#FF6B26',
          'accent2-text' => '#ffffff',
          'accent2-hover-bg' =>'#F79917',
          'accent2-hover-text' => '#ffffff',

          'accent3-bg' =>'#F79917',
          'accent3-text' => '#ffffff',
          'accent3-hover-bg' =>'#f7b355',
          'accent3-hover-text' => '#ffffff',


        ]);

        $style->save();
    }
}
