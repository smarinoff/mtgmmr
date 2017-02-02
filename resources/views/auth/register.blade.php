@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="ui segment">
    <h1 class="ui dividing header">Register</h1>

    <form class="ui form" role="form" method="POST" action="{{ url('/register') }}">
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

        <div class="ui field{{ $errors->has('email') ? ' error' : '' }}">
            <label for="email">E-Mail Address</label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <div class="ui message negative">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                @endif

        </div>

        <div class="ui field{{ $errors->has('password') ? ' error' : '' }}">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <div class="ui message negative">
                    <p>{{ $errors->first('password') }}</p>
                </div>
            @endif

        </div>

        <div class="ui field">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>

        </div>

        <div class="ui field">

            <button type="submit" class="ui button primary">
                Register
            </button>

        </div>
    </form>
</div>

@endsection
