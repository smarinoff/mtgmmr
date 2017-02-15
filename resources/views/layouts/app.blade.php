<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>MTG MMR - @yield('title')</title>
  <link href="/css/all.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">

</head>
<body>
<div class="content">

  <!-- Top Menu -->
    <div class="ui inverted vertical center aligned segment">
      <div class="ui container">
        <div class="ui large secondary inverted pointing menu">

          <a class="item" href="/">Home</a>
          <a class="item" href="{{action('DeckController@index')}}">Decks</a>
          <a class="item" href="{{action('MatchController@index')}}">Matches</a>

          <div class="right item">
            @if(!Auth::check())
              <a class="ui inverted item" href="{{action('Auth\LoginController@showLoginForm')}}">Log In</a>
              <a class="ui inverted item" href="{{action('Auth\RegisterController@showRegistrationForm')}}">Sign Up</a>
            @else
              <div class="ui compact inverted menu">
                <div class="ui dropdown item">
                  <span class="text">My Account</span>
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <a class="item" href="#">Profile</a>
                    <div class="item">
                      <i class="dropdown icon"></i>
                      <span class="text">Decks</span>
                      <div class="menu">
                        <a class="item" href="{{action('DeckController@userDecks', ['user' => Auth::user()])}}">My Decks</a>
                        <a class="item" href="{{action('DeckController@create')}}">Add New</a>
                      </div>
                    </div>
                    <a class="item" href="{{action('Auth\LoginController@logout')}}">Logout</a>
                  </div>
                </div>
              </div>
            @endif
          </div>

        </div>
      </div>
    </div>

    <!-- Page Contents -->
  <div class="ui grid container main">

    @if(Session::has('message'))
      <div class="center aligned row">
        <div class="column">
          <div class="ui message {{Session::get('type')}}">
            {{Session::get('message')}}
          </div>
        </div>
      </div>
    @endif

    @yield('content')  
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">About</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Sitemap</a>
            <a href="#" class="item">Contact Us</a>
            <a href="#" class="item">Religious Ceremonies</a>
            <a href="#" class="item">Gazebo Plans</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Services</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Banana Pre-Order</a>
            <a href="#" class="item">DNA FAQ</a>
            <a href="#" class="item">How To Access</a>
            <a href="#" class="item">Favorite X-Men</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Footer Header</h4>
          <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/js/all.js"></script>

@yield('scripts')

</body>

</html>
