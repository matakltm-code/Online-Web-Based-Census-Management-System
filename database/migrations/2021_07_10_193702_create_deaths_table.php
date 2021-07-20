<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            // -----------
            // Default enumerator value - b/c enumerator user type only can register houses
            $table->integer('user_id');
            $table->integer('region_id');
            // -----------
            $table->integer('house_id');
            $table->string('name');
            $table->char('sex', 1);
            $table->date('date_of_birth');
            $table->date('date_of_death');
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
        Schema::dropIfExists('deaths');
    }
}
