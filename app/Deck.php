<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'format_id'];

    /**
     * The colours this deck uses
     *
     * @return array
     */
    public function colours()
    {
    	return $this->belongsToMany('App\Colour');
    }

    /**
     * The format of this deck
     *
     * @return array
     */
    public function format()
    {
    	return $this->belongsTo('App\DeckFormat', 'format_id');
    }

    /**
     * The matches using this deck
     *
     * @return array
     */
    public function matches()
    {
    	return $this->belongsToMany('App\Match');
    }

    /**
     * The user this deck belongs to
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
