@extends('layouts.app')

@section('title', 'Create a Match')

@section('content')

	<div class="row">
		<div class="column">
			<h1 class="ui header">
				Create a Match
			</h1>
			<form class="ui form" role="form" method="POST" id="create_match" action="{{action('MatchController@store')}}">
		        {{ csrf_field() }}

				<div class="field">
				    <label for="format_id">Format</label>
				    <select id="format_id" name="format_id" required class="ui fluid dropdown">
				    	@foreach ($formats as $format)
				    		{{ $selected = ( old('format_id') == $format->id ) ? ' selected="selected"' : '' }}
				    		<option value="{{$format->id}}"{{$selected}}>{{$format->name}}</option>
				    		}
				    	@endforeach
				    </select>
				</div>

				<div class="field">
				    <label for="user_id">Players</label>
				    <select id="user_id" name="user_id[]" required multiple="" class="ui fluid dropdown">
				    	@foreach ($users as $user)
				    		{{ $selected = ( !empty( old('user_id[]') ) && in_array($user->id, old('user_id[]'))) ? ' selected="selected"' : '' }}

				    		<option value="{{$user->id}}"{{$selected}}>{{$user->name}}</option>
				    	@endforeach
				    </select>
				</div>

				@foreach ($users as $user)
					<div class="hidden field user{{$user->id}}">
						<label for="user_{{$user->id}}_deck">{{$user->name}}'s Deck</label>
						<select id="user_{{$user->id}}_deck" name="deck_id[]" class="ui fluid dropdown">
					    	@foreach ($user->decks as $deck)
					    		{{ $selected = ( !empty( old('deck_id[]') ) && in_array($deck->id, old('deck_id[]'))) ? ' selected="selected"' : '' }}
					    		<option value="{{$deck->id}}"{{$selected}}>{{$deck->name}}</option>
					    		}
					    	@endforeach
					    </select>
					</div>
				@endforeach

				<div class="field">
				    <label for="winner_id">Winner(s)</label>
				    <select id="winner_id" name="winner_id[]" required multiple="" class="ui fluid dropdown">
				    	@foreach ($users as $user)
				    		{{ $selected = ( !empty( old('winner_id[]') ) && in_array($user->id, old('winner_id[]'))) ? ' selected="selected"' : '' }}

				    		<option value="{{$user->id}}"{{$selected}}>{{$user->name}}</option>
				    	@endforeach
				    </select>
				</div>

		        <div class="ui field">
				    <button type="submit" class="ui button primary">
				        Create Match
				    </button>
				</div>
		    </form>
		</div>
	</div>

@endsection