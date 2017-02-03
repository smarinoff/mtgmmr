@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="row">
		<div class="column">
			<h1 class="ui header">
				Create a Deck
			</h1>
			<form class="ui form" role="form" method="POST" action="{{action('DeckController@store')}}">
		        @include('deck.form')

		        <div class="ui field">
				    <button type="submit" class="ui button primary">
				        Create Deck
				    </button>
				</div>
		    </form>
		</div>
	</div>

@endsection