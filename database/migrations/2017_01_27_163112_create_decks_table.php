<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('deck_formats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('decks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('format_id')->unsigned();
            $table->integer('status')->unsigned()->nullable()->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('deck_formats');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decks');
        Schema::dropIfExists('deck_formats');
        Schema::dropIfExists('colours');
    }
}
