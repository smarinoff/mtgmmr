@extends('layouts.app')

@section('title', 'Match')

@section('content')

	<div class="row center aligned">
		<div class="column">

			<div class="ui segment">

				<h1 class="ui dividing header">
					Match {{$match->id}}
				</h1>
				<div class="ui grid">
					<div class="eight wide column">
						<p>Created on: {{date('F j, Y', strtotime($match->created_at))}}</p>
					</div>
					<div class="eight wide column">
						<p>Format: {{$match->format->name}}</p>
					</div>
				</div>
			</div>

			<div class="container">
				@if($decks->isEmpty())
					<p>Sorry, couldn't find any decks.</p>
				@else
					<div class="ui two stackable cards">
						@foreach($decks as $deck)
							<div class="ui card">
								<div class="content">
									<h3 class="ui dividing header">
										<a href="#">{{$deck->user->name}}</a>
										@if( $deck->pivot->winner == 1 )
											&nbsp;(Winner)
										@endif
									</h3>
									<h4>
										<a href="{{action('DeckController@show', ['id' => $deck->id])}}">{{$deck->name}}</a>
									</h4>
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