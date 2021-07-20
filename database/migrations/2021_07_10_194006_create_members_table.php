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
            // -----------
            // Default enumerator value - b/c enumerator user type only can register houses
            $table->integer('user_id');
            $table->integer('region_id');
            // -----------
            $table->integer('house_id');
            $table->string('name');

            $table->integer('kebele_id_number')->nullable();

            $table->date('birth_date');
            $table->char('sex', 1);

            $table->integer('religion_id'); // from religions table
            $table->integer('mother_tongue_language_id'); // from mother_tongue_languages table

            $table->boolean('is_disable');
            $table->string('disability_cause')->nullable();

            $table->boolean('is_migrant');
            $table->integer('p_region_id')->nullable();
            $table->string('p_zone')->nullable();
            $table->string('p_wereda')->nullable();
            $table->string('p_town')->nullable();
            $table->string('p_kebele')->nullable();

            $table->boolean('is_orphan');
            $table->boolean('is_literate');
            $table->integer('education_level_id')->nullable(); // comes from education_levels table
            $table->string('marital_status'); // single, married, separated, divorced, or widowed

            $table->boolean('have_income');

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
