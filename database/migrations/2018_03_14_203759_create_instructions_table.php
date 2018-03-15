<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('intro0');
            $table->text('intro1');
            $table->text('introh1');
            $table->text('intro2');
            $table->text('introh2');

            $table->text('method0');
            $table->text('method1');
            $table->text('methodh1');
            $table->text('method2');
            $table->text('methodh2');

            $table->text('results0');
            $table->text('results1');
            $table->text('resultsh1');

            $table->text('implications0');
            $table->text('implications1');
            $table->text('implicationsh1');
            $table->text('implications2');
            $table->text('implicationsh2');

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
        Schema::dropIfExists('instructions');
    }
}
