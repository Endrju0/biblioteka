@extends('layouts/app')
@section('title')
    Lista książek
@endsection

@section('content')
    <div class="container">
        <h2>Dodawanie autora</h2>
        <form action="{{ action('App\Http\Controllers\AuthorController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="lastname">Nazwisko</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="form-group">
                <label for="firstname">Imię</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group">
                <label for="birthday">Data urodzenia</label>
                <input type="date" value="2020-01-01" class="form-control" name="birthday">
            </div>
            <div class="form-group">
                <label for="genres">Gatunki</label>
                <input type="text" class="form-control" name="genres">
            </div>

            <input type="submit" value="Dodaj" class="btn btn-primary">
        </form>
    </div>
@endsection