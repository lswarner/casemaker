<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->default('');
            $table->string('background')->default('');

            $table->char('primary-bg', 7)->default('#135693');
            $table->char('primary-text', 7)->default('#ffffff');
            $table->char('primary-hover-bg', 7)->default('#6BC7FF');
            $table->char('primary-hover-text', 7)->default('#ffffff');

            $table->char('secondary-bg', 7)->default('#2699FF');
            $table->char('secondary-text', 7)->default('#ffffff');
            $table->char('secondary-hover-bg', 7)->default('#51a4ff');
            $table->char('secondary-hover-text', 7)->default('#ffffff');

            $table->char('info-bg', 7)->default('#6BC7FF');
            $table->char('info-text', 7)->default('#ffffff');
            $table->char('info-hover-bg', 7)->default('#5ba9d9');
            $table->char('info-hover-text', 7)->default('#ffffff');

            $table->char('accent1-bg', 7)->default('#FF3821');
            $table->char('accent1-text', 7)->default('#ffffff');
            $table->char('accent1-hover-bg', 7)->default('#F79917');
            $table->char('accent1-hover-text', 7)->default('#ffffff');

            $table->char('accent2-bg', 7)->default('#FF6B26');
            $table->char('accent2-text', 7)->default('#ffffff');
            $table->char('accent2-hover-bg', 7)->default('#F79917');
            $table->char('accent2-hover-text', 7)->default('#ffffff');

            $table->char('accent3-bg', 7)->default('#F79917');
            $table->char('accent3-text', 7)->default('#ffffff');
            $table->char('accent3-hover-bg', 7)->default('#f7b355');
            $table->char('accent3-hover-text', 7)->default('#ffffff');

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
        Schema::dropIfExists('cms');
    }
}
