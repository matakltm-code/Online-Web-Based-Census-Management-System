<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // this is enumerator id b/c -> enumerator user type only can register houses
            $table->integer('house_number');
            $table->integer('number_of_room');
            $table->string('house_level'); // high, medium, low
            $table->integer('number_of_son');
            $table->string('number_of_daughter');

            $table->integer('region_id'); // comes from regions table
            $table->string('zone');
            $table->string('wereda');
            $table->string('town');
            $table->string('kebele');

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
        Schema::dropIfExists('houses');
    }
}
