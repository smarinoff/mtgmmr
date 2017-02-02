<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchFormat extends Model
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
    protected $table = 'match_formats';

    /**
     * The matches of this format
     *
     * @return array
     */
    public function matches()
    {
    	return $this->hasMany('App\Match', 'format_id');
    }
}
