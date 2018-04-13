<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogosTitlesToCms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->string('casemaker_logo')->default('img/isc-logo-web344.jpg')->after('id');
            $table->string('casemaker_title')->default('CaseMaker')->after('casemaker_logo');

            $table->string('library_logo')->default('img/isc-logo-web344.jpg')->after('casemaker_title');
            $table->string('library_title')->default('Case Study Library')->after('library_logo');

            $table->string('splash_image')->default('img/register_bg.jpg')->after('library_title');
        });

        Schema::table('cms', function (Blueprint $table){

          $table->string('casemaker_logo')->default('img/isc-logo-web344.jpg')->change();
          $table->string('splash_image')->default('img/register_bg.jpg')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->dropColumn(['library_logo', 'library_title', 'casemaker_title', 'casemaker_logo', 'splash_image']);
        });
    }
}
