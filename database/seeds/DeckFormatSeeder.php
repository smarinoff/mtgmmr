<?php

use Illuminate\Database\Seeder;
use App\DeckFormat;

class DeckFormatSeeder extends Seeder
{
    protected $formats = ['commander', 'standard', 'modern', 'legacy', 'vintage'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach( $this->formats as $format) {
			DeckFormat::create( ['name' => ucwords( $format )] );
		}
    }
}
