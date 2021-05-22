<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ URL::asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">@yield('title')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Książki
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="{{URL::to('books')}}" class="dropdown-item">Wszystkie książki</a></li>
                <li><a href="{{URL::to('books/cheapest')}}" class="dropdown-item">Top 3 najtańsze</a></li>
                <li><a href="{{URL::to('books/longest')}}" class="dropdown-item">Top 3 najdłuższe</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('loans')}}" class="nav-link">Wypożyczenia</a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('authors')}}" class="nav-link">Autorzy</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        @yield('content')    
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script href="{{ asset('js/code.js') }}"></script>
</body>
</html>