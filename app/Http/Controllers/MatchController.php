<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deck;
use App\DeckFormat;
use App\Match;
use App\MatchFormat as Format;
use App\User;
use Session;
use \Auth;

class MatchController extends Controller
{
    /**
     * Instantiate a new DeckController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'userMatches', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::orderBy('created_at', 'desc')->get();

        return view('matches.index', ['matches' => $matches]);
    }

    /**
     * Display a listing of the matches belonging to the authenticated user
     */
    public function userMatches(User $user = null)
    {
        $matches = collect( array() );

        $user->load(['decks.matches' => function($query) use (&$matches) {
            $matches = $query->orderBy('created_at', 'desc')->get();
        }]);

        return view('matches.index', ['matches' => $matches, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matches.create', ['match' => (new Match), 'users' => User::all(), 'formats' => Format::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = new Match($request->all());
        $match->save();

        //Prepare the pivot data
        $deck_match_data = array();

        foreach( $request->input('deck_id') as $key => $deck_id ) {

            //Get the Deck instance
            $deck = Deck::find($deck_id);

            if ( in_array( $deck->user->id, $request->input('winner_id') ) ) {
                $deck_match_data[$deck_id] = array( 'winner' => 1 );
            } else {
                $deck_match_data[$deck_id] = array( 'winner' => 0 );
            }
        }

        $match->decks()->sync($deck_match_data);

        Session::flash('message', 'Your match was successfully saved!');
        Session::flash('type', 'positive');

        return redirect(action('MatchController@show', ['id' => $match->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return view('matches.show', ['match' => $match, 'decks' => $match->decks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
