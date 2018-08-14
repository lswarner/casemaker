<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicFieldsToCaseStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_studies', function (Blueprint $table) {
          $table->char('author', 255)->default('')->after('countries');
          $table->text('description')->nullable()->after('author');
          $table->text('references')->nullable()->after('description');
          $table->string('featured_image')->default('')->after('references');
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
            $table->dropColumns(['author', 'description', 'references', 'featured_image']);
        });
    }
}
