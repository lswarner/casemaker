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
        Schema::create('casestudy_method', function (Blueprint $table) {
          $table->integer('casestudy_id')->unsigned()->nullable();
          $table->foreign('casestudy_id')->references('id')
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
        Schema::dropIfExists('casestudy_method');
    }
}
