<?php

use Illuminate\Database\Seeder;
use App\Colour;

class ColourSeeder extends Seeder
{
    protected $colours = ['white', 'blue', 'black', 'red', 'green', 'colourless'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach( $this->colours as $colour) {
			Colour::create( ['name' => ucwords( $colour )] );
		}
    }
}