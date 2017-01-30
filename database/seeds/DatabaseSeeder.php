<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call( ColourSeeder::class );
        $this->call( DeckFormatSeeder::class );
        $this->call( MatchFormatSeeder::class );
    }
}
