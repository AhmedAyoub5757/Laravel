<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class'); //warrior, mage, rogue, etc.
            $table->integer('level');
            $table->integer('health_points');
            $table->boolean('is_boss')->default(false);
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
        Schema::dropIfExists('characters_tables');
    }
}
