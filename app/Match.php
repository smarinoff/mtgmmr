<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	/**
     * The format of this match
     *
     * @return array
     */
    public function format()
    {
    	return $this->belongsTo('App\MatchFormat', 'format_id');
    }

    /**
     * The decks used in this match
     *
     * @return array
     */
    public function decks()
    {
    	return $this->belongsToMany('App\Deck');
    }
}
