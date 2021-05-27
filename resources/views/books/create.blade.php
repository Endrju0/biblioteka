@extends('template')
@section('title')
    Lista książek
@endsection

@section('content')
    <div class="container">
        <h2>Dodawanie książki</h2>
        <form action="{{ action('App\Http\Controllers\BookController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Tytuł książki</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="year">Rok publikacji</label>
                <input type="text" class="form-control" name="year">
            </div>
            <div class="form-group">
                <label for="publication_place">Miejsce wydania</label>
                <input type="text" class="form-control" name="publication_place">
            </div>
            <div class="form-group">
                <label for="pages">Liczba stron</label>
                <input type="text" class="form-control" name="pages">
            </div>
            <div class="form-group">
                <label for="price">Cena</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="author_id">Autor</label>
                <select class="form-select" name="author_id[]" multiple>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->lastname }} {{ $author->firstname }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Dodaj" class="btn btn-primary">
        </form>
    </div>
@endsection