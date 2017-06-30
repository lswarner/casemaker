<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStudyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_study_user', function (Blueprint $table) {
          $table->integer('case_study_id')->unsigned()->nullable();
          $table->foreign('case_study_id')->references('id')
                ->on('case_studies')->onDelete('cascade');

          $table->integer('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('case_study_user');
    }
}
