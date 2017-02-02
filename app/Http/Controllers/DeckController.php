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
    public function userDecks(User $user)
    {
        if ( !$user ) {
            $user = Auth::user();
        }

        if ($user) {
            return view('deck.index', ['decks' => $user->decks]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deck.create', ['colours' => Colour::all(), 'formats' => Format::all()]);
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

        Session::flash('flash_message', 'Deck successfully created!');

        return redirect(action('DeckController@show', ['id' => $deck->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deck = Deck::with('colours', 'format', 'user')->where('id', $id)->first();

        return view('deck.show', ['deck' => $deck]);
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
