@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="center aligned row">
		<div class="column">
			<div class="ui message">
				<h1 class="ui header">
					Browse Decks
				</h1>
				<p>Check out all these sweet decks.</p>
			</div>
			<div class="container">
			{{print_r($decks)}}
			</div>
		</div>
	</div>

@endsection