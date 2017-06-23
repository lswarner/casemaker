<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('title', 255)->default('');
            $table->text('countries')->nullable();
            $table->text('keywords')->nullable();

            $table->text('intro_context')->nullable();
            $table->text('intro_nuances')->nullable();
            $table->text('intro_tips')->nullable();
            $table->text('intro_acronyms')->nullable();
            $table->text('intro_objectives')->nullable();
            $table->text('intro_questions')->nullable();
            $table->text('intro_files')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_studies');
    }
}
