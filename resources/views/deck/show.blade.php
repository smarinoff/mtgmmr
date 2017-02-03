@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="row center aligned">
		<div class="column">

			<div class="ui segment">

				@if(Auth::check() && Auth::user()->id == $deck->user->id)
					<div class="ui right floated buttons">
						<a class="ui icon button" href="{{action('DeckController@edit', ['id' => $deck->id])}}"><i class="edit icon"></i></a>
						<form method="post" action="{{action('DeckController@destroy', ['id' => $deck->id])}}">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button class="ui icon button" href="{{action('DeckController@destroy', ['id' => $deck->id])}}"><i class="remove circle icon"></i></button>
						</form>
					</div>
				@endif

				<h1 class="ui header">
					{{$deck->name}}
				</h1>
				<p class="ui dividing header">{{$deck->description}}</p>
				<div class="ui grid">
					<div class="four wide column">
						<p>Created by: {{$deck->user->name}}</p>
					</div>
					<div class="four wide column">
						<p>Last modified: {{date('F j, Y', strtotime($deck->updated_at))}}</p>
					</div>
					<div class="four wide column">
						<p>Format: {{$deck->format->name}}</p>
					</div>
					<div class="four wide column">
						<p>Colour(s):
							@foreach ($deck->colours as $colour)
								{{$colour->name}}
							@endforeach
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection