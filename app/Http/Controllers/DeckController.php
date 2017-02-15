<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deck;
use App\User;
use App\DeckFormat as Format;
use App\Colour;
use Session;
use \Auth;

class DeckController extends Controller
{
    /**
     * Instantiate a new DeckController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'userDecks', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('deck.index', ['decks' => Deck::all()]);
    }

    /**
     * Display a listing of the resources belonging to the authenticated user
     */
    public function userDecks(User $user = null)
    {
        return view('deck.index', ['decks' => $user->decks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deck.create', ['deck' => (new Deck), 'colours' => Colour::all(), 'formats' => Format::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deck = new Deck($request->all());
        $deck->user_id = Auth::user()->id;
        $deck->save();

        $deck->colours()->sync($request->input('colour_id'));

        Session::flash('message', 'Your new '.$deck->name.' deck successfully created!');
        Session::flash('type', 'positive');

        return redirect(action('DeckController@show', ['id' => $deck->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deck $deck)
    {
        return view('deck.show', ['deck' => $deck]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deck $deck)
    {
        if ( Auth::user()->id == $deck->user_id ) {
            return view('deck.edit', ['deck' => $deck, 'colours' => Colour::all(), 'formats' => Format::all()]);
        } else {
            //Indicate the user doesn't have permission
            Session::flash('message', 'You do not have permission to edit this deck.');
            Session::flash('type', 'error');

            return redirect(action('DeckController@show', ['id' => $deck->id]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deck $deck)
    {
        //Only allow the user who created the deck to update it
        if ( Auth::user()->id == $deck->user_id ) {

            //Update the deck
            $deck->update($request->all());
            $deck->save();

            //Sync the colour pivot
            $deck->colours()->sync($request->input('colour_id'));

            Session::flash('message', 'Your "'.$deck->name.'" deck was successfully edited!');
            Session::flash('type', 'positive');
        }

        return redirect(action('DeckController@show', ['id' => $deck->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deck $deck)
    {
        $deck->delete();

        Session::flash('message', 'Deck successfully deleted!');
        Session::flash('type', 'positive');

        return redirect(action('DeckController@userDecks', ['user' => Auth::user()]));
    }
}
