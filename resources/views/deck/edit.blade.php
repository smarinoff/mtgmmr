@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="row">
		<div class="column">
			<h1 class="ui header">
				Edit Your Deck
			</h1>
			<form class="ui form" role="form" method="POST" action="{{action('DeckController@update', ['id' => $deck->id])}}">

		        @include('deck.form')

		        {{ method_field('PUT') }}

		        <div class="ui field">
				    <button type="submit" class="ui button primary">
				        Save Deck
				    </button>
				</div>
		    </form>
		</div>
	</div>

@endsection