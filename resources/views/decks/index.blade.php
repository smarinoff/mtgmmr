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
				@if($decks->isEmpty())
					<p>Sorry, couldn't find any decks.</p>
				@else
					<div class="ui four cards">
						@foreach($decks as $deck)
							<div class="ui card">
								<div class="content">
									<h3 class="ui dividing header">
										<a href="{{action('DeckController@show', ['id' => $deck->id])}}">{{$deck->name}}</a>
									</h3>
									@if (!empty( $deck->description ) )
										<p>{{$deck->description}}</p>
									@endif
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection