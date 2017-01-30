<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colour_deck', function (Blueprint $table) {
            $table->integer('colour_id')->unsigned();
            $table->integer('deck_id')->unsigned();

            $table->foreign('colour_id')->references('id')->on('colours')->onDelete('cascade');
            $table->foreign('deck_id')->references('id')->on('decks')->onDelete('cascade');
        });

        Schema::create('deck_match', function (Blueprint $table) {
            $table->integer('deck_id')->unsigned();
            $table->integer('match_id')->unsigned();
            $table->integer('winner')->unsigned();

            $table->foreign('deck_id')->references('id')->on('decks')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deck_match');
        Schema::dropIfExists('colour_deck');
    }
}
