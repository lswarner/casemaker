<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('invitations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('case_study_id')->unsigned()->nullable();
            $table->foreign('case_study_id')->references('id')
                  ->on('case_studies')->onDelete('cascade');

            $table->string('email');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');

            $table->timestamps();

            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
