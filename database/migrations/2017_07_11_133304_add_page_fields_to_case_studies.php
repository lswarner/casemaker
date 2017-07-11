<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageFieldsToCaseStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('case_studies', function (Blueprint $table) {

        $table->text('method_used')->nullable();
        $table->text('method_challenges')->nullable();
        $table->text('method_tips')->nullable();
        $table->text('method_partners')->nullable();
        $table->text('method_questions')->nullable();
        $table->text('method_files')->nullable();

        $table->text('results_discuss')->nullable();
        $table->text('results_challenges')->nullable();
        $table->text('results_tips')->nullable();
        $table->text('results_questions')->nullable();
        $table->text('results_files')->nullable();

        $table->text('implications_discuss')->nullable();
        $table->text('implications_challenges')->nullable();
        $table->text('implications_tips')->nullable();
        $table->text('implications_questions')->nullable();
        $table->text('implications_files')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_studies', function (Blueprint $table) {
          
          $table->dropColumn('method_used');
          $table->dropColumn('method_challenges');
          $table->dropColumn('method_tips');
          $table->dropColumn('method_partners');
          $table->dropColumn('method_questions');
          $table->dropColumn('method_files');

          $table->dropColumn('results_discuss');
          $table->dropColumn('results_challenges');
          $table->dropColumn('results_tips');
          $table->dropColumn('results_questions');
          $table->dropColumn('results_files');

          $table->dropColumn('implications_discuss');
          $table->dropColumn('implications_challenges');
          $table->dropColumn('implications_tips');
          $table->dropColumn('implications_questions');
          $table->dropColumn('implications_files');
        });
    }
}
