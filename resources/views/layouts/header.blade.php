<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @include('layouts.top_menu', ['categories' => $categories])
                <!-- Authentication Links -->
                    <li><a href="{{ route('about') }}">Обо мне</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
            </ul>
            <ul class="nav navbar-nav ">


            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="navbar navbar-default navbar-fixed-bottom" style=" margin-top: 10%">
  <div class="row" >
    <div class="col-md-12 col-md-offset-4">
      <ul class="nav navbar-nav">
          @include('layouts.top_menu', ['categories' => $categories])
          <!-- Authentication Links -->
              <li><a href="{{ route('about') }}">Обо мне</a></li>
              <li><a href="{{ route('contact') }}">Контакты</a></li>
      </ul>
    </div>
    <div class="col-md-12 col-md-offset-4">
      <p class="navbar-text">
       © 2023 Здоровое питание. Сайт создан SmartAppTech
    </p>
    </div>
  </div>



</div>
