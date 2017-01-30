<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
	/**
     * Whether to use timestamp columns
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The decks using this colour
     *
     * @return array
     */
    public function decks()
    {
    	return $this->belongsToMany('App\Deck');
    }
}
