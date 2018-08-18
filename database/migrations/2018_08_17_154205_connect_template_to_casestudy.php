<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectTemplateToCasestudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::table('case_studies', function (Blueprint $table) {
          //add foreign key denoting a CaseStudy belongsTo a Template
          $table->integer('template_id')->unsigned();

          //foreign key cascade- when a CategoryGroup is deleted, delete all of its' Categories
          $table->foreign('template_id')
            ->references('id')
            ->on('templates')
            ->onDelete('cascade');
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
            $table->dropForeign(['template_id']);
            $table->dropColumn('template_id');
        });
    }
}
