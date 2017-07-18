<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToCaseStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->timestamp('submitted_at')->after('updated_at')->nullable();
            $table->timestamp('published_at')->after('submitted_at')->nullable();
                $table->char('status', 10)->after('published_at')->default('created');  /* created | submitted | published */
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
            $table->dropColumn('status');
            $table->dropColumn('submitted_at');
            $table->dropColumn('published_at');
        });
    }
}
