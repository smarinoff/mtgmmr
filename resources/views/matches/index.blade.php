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
					<table class="ui celled padded sortable table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Date</th>
								<th>Format</th>
								<th>Type</th>
								<th>Winner(s)</th>
								<th>Players</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
						@foreach($matches as $match)
							<tr>
								<td>{{$match->id}}</td>
								<td>{{date('F j, Y', strtotime($match->created_at))}}</td>
								<td>{{$match->decks->first()->format->name}}</td>
								<td>{{$match->format->name}}</td>
								<td>
									@foreach($match->decks as $deck)
										@if($deck->pivot->winner == 1)
											{{$deck->user->name}},
										@endif
									@endforeach
								</td>
								<td>
									@foreach($match->decks as $deck)
										{{$deck->user->name}},
									@endforeach
								</td>
								<td>
									<a href="{{action('MatchController@show', ['id' => $match->id])}}">View</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>

@endsection