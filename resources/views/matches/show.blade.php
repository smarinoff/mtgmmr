@extends('layouts.app')

@section('title', 'Match')

@section('content')

	<div class="row center aligned">
		<div class="column">

			<div class="ui segment">

				<h1 class="ui header">
					Match {{$match->id}}
				</h1>
				<p class="ui dividing header">A fierce battle took place between some people.</p>
				<div class="ui grid">
					<div class="four wide column">
						<p>Created by: </p>
					</div>
					<div class="four wide column">
						<p>Last modified: {{date('F j, Y', strtotime($match->updated_at))}}</p>
					</div>
					<div class="four wide column">
						<p>Format: {{$match->format->name}}</p>
					</div>
					<div class="four wide column">
						<p>Colour(s):

						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection