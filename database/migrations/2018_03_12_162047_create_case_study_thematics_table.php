<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStudyThematicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_study_thematics', function (Blueprint $table) {
          $table->integer('case_study_id')->unsigned()->nullable();
          $table->foreign('case_study_id')->references('id')
                ->on('case_studies')->onDelete('cascade');

          $table->integer('thematics_id')->unsigned()->nullable();
          $table->foreign('thematics_id')->references('id')
                ->on('thematics')->onDelete('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_study_thematics');
    }
}
