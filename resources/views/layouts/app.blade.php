<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">@yield('title', 'Biblioteka')</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Języki
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                      <li><a href="{{URL::to('language/pl')}}" class="dropdown-item">Polski</a></li>
                      <li><a href="{{URL::to('language/en')}}" class="dropdown-item">Angielski</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBooks" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Książki
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownBooks">
                      <li><a href="{{URL::to('books/create')}}" class="dropdown-item">Dodaj nową</a></li>
                      <li><a href="{{URL::to('books')}}" class="dropdown-item">Wszystkie książki</a></li>
                      <li><a href="{{URL::to('books/cheapest')}}" class="dropdown-item">Top 3 najtańsze</a></li>
                      <li><a href="{{URL::to('books/longest')}}" class="dropdown-item">Top 3 najdłuższe</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLoans" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Wypożyczenia
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLoans">
                      <li><a href="{{URL::to('loans/create')}}" class="dropdown-item">Dodaj nowe wypożyczenie</a></li>
                      <li><a href="{{URL::to('loans')}}" class="dropdown-item">Wszystkie wypożyczenia</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAuthors" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Autorzy
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAuthors">
                      <li><a href="{{URL::to('authors/create')}}" class="dropdown-item">Dodaj nowego</a></li>
                      <li><a href="{{URL::to('authors')}}" class="dropdown-item">Wszyscy autorzy</a></li>
                    </ul>
                  </li>
                  @endauth
                  @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                  @endguest
                </ul>
                @auth
                <div class="navbar-nav nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownUser">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
                @endauth
            </div>
        </nav>

        <main class="container py-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif
            @yield('content')    
        </main> 
    </div>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script href="{{ asset('js/code.js') }}"></script>
</body>
</html>
