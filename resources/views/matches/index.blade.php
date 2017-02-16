@extends('layouts.app')

@section('title', 'Matches')

@section('content')

	<div class="center aligned row">
		<div class="column">
			<div class="ui message">
				<h1 class="ui header">
					Browse Matches
				</h1>
			</div>
			<div class="container">
				@if($matches->isEmpty())
					<p>Sorry, couldn't find any matches.</p>
				@else
					<p>Test</p>
				@endif
			</div>
		</div>
	</div>

@endsection