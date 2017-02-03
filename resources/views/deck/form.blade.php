{{ csrf_field() }}

<div class="ui field{{ $errors->has('name') ? ' error' : '' }}">
    <label for="name">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" name="name" value="{{ old('name', $deck->name) }}" required autofocus>

        @if ($errors->has('name'))
            <div class="ui message negative">
                <p>{{ $errors->first('name') }}</p>
            </div>
        @endif
    </div>
</div>

<div class="ui field">
    <label for="description">Description</label>
        <textarea id="description" name="description" rows="2">{{ old('description', $deck->description) }}</textarea>
</div>

<div class="ui field">
    <label for="format_id">Format</label>
    <select id="format_id" name="format_id" required class="ui fluid search dropdown">
    	@foreach ($formats as $format)
    		{{ $selected = ( old('format_id', $deck->format->id) == $format->id ) ? ' selected="selected"' : '' }}
    		<option value="{{$format->id}}"{{$selected}}>{{$format->name}}</option>
    		}
    	@endforeach
    </select>
</div>

<div class="ui field">
    <label for="colour_id">Colour(s)</label>
    <select id="colour_id" name="colour_id[]" required multiple="" class="ui fluid search dropdown">
    	@foreach ($colours as $colour)
    		{{ $selected = ( in_array($colour->id, old('colour_id[]', $deck->colours->pluck('id')->all()))) ? ' selected="selected"' : 'data-test="fake"' }}

    		<option value="{{$colour->id}}"{{$selected}}>{{$colour->name}}</option>
    	@endforeach
    </select>
</div>