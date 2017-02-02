@extends('layouts.app')

@section('title', 'Decks')

@section('content')

	<div class="row">
		<div class="column">
			<h1 class="ui header">
				Create a Deck
			</h1>
			<form class="ui form" role="form" method="POST" action="{{action('DeckController@store')}}">
		        {{ csrf_field() }}

		        <div class="ui field{{ $errors->has('name') ? ' error' : '' }}">
		            <label for="name">Name</label>

		            <div class="col-md-6">
		                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

		                @if ($errors->has('name'))
		                    <div class="ui message negative">
		                        <p>{{ $errors->first('name') }}</p>
		                    </div>
		                @endif
		            </div>
		        </div>

		        <div class="ui field">
		            <label for="description">Description</label>
		                <textarea id="description" name="description" rows="2">{{ old('description') }}</textarea>
		        </div>

		        <div class="ui field">
		            <label for="format_id">Format</label>
		            <select id="format_id" name="format_id" required class="ui fluid search dropdown">
		            	@foreach ($formats as $format)
		            		<option value="{{$format->id}}">{{$format->name}}</option>
		            	@endforeach
		            </select>
		        </div>

		        <div class="ui field">
		            <label for="colour_id">Colour(s)</label>
		            <select id="colour_id" name="colour_id[]" required multiple="" class="ui fluid search dropdown">
		            	@foreach ($colours as $colour)
		            		<option value="{{$colour->id}}">{{$colour->name}}</option>
		            	@endforeach
		            </select>
		        </div>

		        <div class="ui field">
		            <button type="submit" class="ui button primary">
		                Create Deck
		            </button>
		        </div>
		    </form>
		</div>
	</div>

@endsection