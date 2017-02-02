@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="row center aligned">
		<div class="column">
			<div class="ui segment">
				@if(Auth::check() && Auth::user()->id == $deck->user->id)
					<div class="ui buttons right floated">
						<a class="ui button">Edit</a>
						<a class="ui button">Delete</a>
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