<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasestudyMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_study_method', function (Blueprint $table) {
          $table->integer('case_study_id')->unsigned()->nullable();
          $table->foreign('case_study_id')->references('id')
                ->on('case_studies')->onDelete('cascade');

          $table->integer('method_id')->unsigned()->nullable();
          $table->foreign('method_id')->references('id')
                ->on('methods')->onDelete('cascade');

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
        Schema::dropIfExists('case_study_method');
    }
}
