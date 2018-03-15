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
          'intro0' => "Getting Started.<br />As you input your case study on this CaseMaker platform, you will find five sections to fill in: introduction, methodology, results, implications, and references. Each of the four narrative sections (i.e. the first four sections) should be approximately 500-750 words. At the beginning of each section, you will find guidance to indicate the type of content you should include in each. For more information on any section or CaseMaker in general, please download the CaseMaker user guide, coming soon under \"How It Works\" in the dropdown menu. <br />Don’t forget to fill out the ‘call-out’ boxes to the left in each section as you go through. You will find instructions on what to put in each box a",
          'introh1' => "Challenge and Intervention Background",
          'intro1' => "<i>Introduction Content Box 1 (Challenge and Intervention Background)>/i> <br />In this section, identify the problem or challenge featured in your case study for the reader. For example, your case study may feature the findings of a study focused on how or how well a particular intervention was implemented in a particular context, and/or how those findings were used to try to improve the implementation of that intervention. In this case, you might want to detail the problem the intervention seeks to address, why the intervention was chosen, and the basic background of that intervention in this particular setting. (~200-400 words)",
          'introh2' => "Additional Contextual Background",
          'intro2' => "Provide the reader with any background or contextual information important for understanding this case study. This may be information on the relevant context",
      ]);
    }
}
