<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('house_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->timestamp('birth_date');
            $table->string('region');
            $table->string('zone');
            $table->string('wereda');
            $table->string('town');
            $table->string('keftegna');
            $table->string('sa');
            $table->string('kebele');
            $table->string('ea');
            $table->string('type_of_residence');
            $table->string('current_residence');
            $table->string('relation');
            $table->string('residence_status');
            $table->string('sex');
            $table->string('religon');
            $table->string('language');
            $table->string('disability_status');
            $table->string('cause');
            $table->string('previous')->nullable();
            $table->string('p_region')->nullable();
            $table->string('p_zone')->nullable();
            $table->string('p_wereda')->nullable();
            $table->string('p_town')->nullable();
            $table->string('p_kebele')->nullable();
            $table->string('number_year')->nullable();
            $table->string('orphan');
            $table->string('literacy');
            $table->string('attending_class');
            $table->string('grade_completed');
            $table->string('marital');
            $table->string('employ');
            $table->string('reason_unemploy');
            $table->integer('no_sons');
            $table->integer('no_daughters');
            $table->integer('male');
            $table->integer('female');
            // $table->timestamp('date');

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
        Schema::dropIfExists('members');
    }
}
