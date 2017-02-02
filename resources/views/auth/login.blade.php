@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row">
    <div class="ui segment">
        <h1 class="ui dividing header">Login</h1>

        <form class="ui form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="ui field{{ $errors->has('email') ? ' error' : '' }}">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <div class="ui negative message">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                @endif
            </div>

            <div class="ui field{{ $errors->has('password') ? ' error' : '' }}">
                <label for="password">Password</label>

                <input id="password" type="password" name="password" required>

                @if ($errors->has('password'))
                    <div class="ui negative message">
                        <p>{{ $errors->first('password') }}</p>
                    </div>
                @endif
            </div>

            <div class="field">
                <div class="ui checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label>Remember Me</label>
                </div>
            </div>

            <div class="field">
                <button type="submit" class="ui button primary">
                    Login
                </button>

                <a class="ui button" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
