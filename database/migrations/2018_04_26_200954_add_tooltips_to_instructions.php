<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTooltipsToInstructions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('instructions', function (Blueprint $table) {
          $table->string('tooltip11h')->before('created_at')->default('Case Study Details');
          $table->string('tooltip11')->before('created_at')->default('Use this box to input the information asked for in the instructions to the right.');
          $table->string('tooltip12h')->before('created_at')->default('Learning Objectives');
          $table->string('tooltip12')->before('created_at')->default('List for the reader what new knowledge or skills they will have after finishing the case study (include 2-4 learning objectives).');
          $table->string('tooltip13h')->before('created_at')->default('Key Acronyms');
          $table->string('tooltip13')->before('created_at')->default('List any acronyms used in your case study in alphabetical order, as well as what they stand for. If you only use a term once the full text, do not include it as an acronym either in the text or in this box.');
          $table->string('tooltip14h')->before('created_at')->default('Discussion Questions');
          $table->string('tooltip14')->before('created_at')->default('Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.');

          $table->string('tooltip21h')->before('created_at')->default('Methods Summary');
          $table->string('tooltip21')->before('created_at')->default('List the main research methods used in either the development of this case study, or in the study that is featured in this case study (e.g. survey, focus group discussions, etc.).');
          $table->string('tooltip22h')->before('created_at')->default('Key Partners and their Roles');
          $table->string('tooltip22')->before('created_at')->default('List the 3-5 key actors/groups of actors in your case study along with a brief description of their roles.');
          $table->string('tooltip23h')->before('created_at')->default('Discussion Questions');
          $table->string('tooltip23')->before('created_at')->default('reate a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.');

          $table->string('tooltip31h')->before('created_at')->default('Key Results');
          $table->string('tooltip31')->before('created_at')->default('Create a list of 1-3 key results the reader should take away from this case study.');
          $table->string('tooltip32h')->before('created_at')->default('Discussion Questions');
          $table->string('tooltip32')->before('created_at')->default('Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.');

          $table->string('tooltip41h')->before('created_at')->default('Program and Policy Implications');
          $table->string('tooltip41')->before('created_at')->default('Create a list of the 1-3 key implications of your case study that ought to inform decisions related to implementation for implementing partners and policy makers.');
          $table->string('tooltip42h')->before('created_at')->default('Discussion Questions');
          $table->string('tooltip42')->before('created_at')->default('Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructions', function (Blueprint $table) {
            $table->dropColumn([
              'tooltip11h', 'tooltip11', 'tooltip12h', 'tooltip12', 'tooltip13h', 'tooltip13', 'tooltip14h', 'tooltip14',
              'tooltip21h', 'tooltip21', 'tooltip22h', 'tooltip22', 'tooltip23h', 'tooltip23',
              'tooltip31h', 'tooltip31', 'tooltip32h', 'tooltip32',
              'tooltip41h', 'tooltip41', 'tooltip42h', 'tooltip42',
          ]);
        });
    }
}
