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
            $table->string('house_number');
            $table->integer('number_of_room');
            $table->string('water');
            $table->string('toilet');
            $table->string('sharing_toilet');
            $table->string('kitchen');
            $table->string('sharing_kitchen');
            $table->string('waste_basket');
            $table->string('tenure');
            $table->string('type_of_house');
            $table->string('wall');
            $table->string('ceiling');
            $table->string('roof');
            $table->string('floor');
            $table->string('house_age');
            $table->string('cooking');
            $table->string('light');
            $table->string('tv');
            $table->string('radio');
            $table->string('phone');
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
