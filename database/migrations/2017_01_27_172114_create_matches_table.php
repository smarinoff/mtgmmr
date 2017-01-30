<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_formats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('format_id')->unsigned();
            $table->timestamps();

            $table->foreign('format_id')->references('id')->on('match_formats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
        Schema::dropIfExists('match_formats');
    }
}
