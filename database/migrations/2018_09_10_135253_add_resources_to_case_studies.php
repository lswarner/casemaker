<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResourcesToCaseStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->text('resources')->nullable();
            $table->text('video')->nullable();
            $table->text('audio')->nullable();
            $table->text('gallery')->nullable();
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
            $table->dropColumn('resources');
            $table->dropColumn('video');
            $table->dropColumn('audio');
            $table->dropColumn('gallery');
        });
    }
}
