<?php

use Illuminate\Database\Seeder;
use App\MatchFormat;

class MatchFormatSeeder extends Seeder
{
    protected $formats = ['free for all', 'two-headed giant', 'emperor', 'star', 'totem'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach( $this->formats as $format) {
			MatchFormat::create( ['name' => ucwords( $format )] );
		}
    }
}
