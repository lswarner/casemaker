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
            $table->renameColumn('logo', 'casemaker_logo');
            $table->renameColumn('background', 'splash_image');

            $table->string('casemaker_logo')->default('img/isc-logo-web344.jpg')->change();
            $table->string('splash_image')->default('img/register_bg.jpg')->change();

            $table->string('casemaker_title')->default('CaseMaker')->after('casemaker_logo');
            $table->string('library_logo')->default('img/isc-logo-web344.jpg')->after('casemaker_title');
            $table->string('library_title')->default('Case Study Library')->after('library_logo');
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
            $table->dropColumn(['library_logo', 'casemaker_title', 'casemaker_logo']);

            $table->renameColumn('casemaker_logo', 'logo');
            $table->renameColumn('splash_image', 'background');
        });
    }
}
