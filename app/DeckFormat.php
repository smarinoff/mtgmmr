<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeckFormat extends Model
{
	/**
     * Whether to use timestamp columns
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deck_format';

    /**
     * The decks using this format
     *
     * @return array
     */
    public function format()
    {
    	return $this->hasMany('App\Deck', 'format_id');
    }
}
