<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasestudyAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('case_study_audience', function (Blueprint $table) {
          $table->integer('case_study_id')->unsigned()->nullable();
          $table->foreign('case_study_id')->references('id')
                ->on('case_studies')->onDelete('cascade');

          $table->integer('audience_id')->unsigned()->nullable();
          $table->foreign('audience_id')->references('id')
                ->on('audiences')->onDelete('cascade');

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
        Schema::dropIfExists('case_study_audience');
    }
}
