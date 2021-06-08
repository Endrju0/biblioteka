@extends('layouts/app')
@section('title')
    Lista wypożyczeń
@endsection

@section('content')
    <div class="container">
        <h2>Dodawanie wypożyczenia</h2>
        <form action="{{ action('App\Http\Controllers\LoanController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="book_id">Tytuł książki</label>
                <select class="form-select" name="book_id">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="client">Dane wypożyczającego</label>
                <input type="text" class="form-control" name="client">
            </div>
            <div class="form-group">
                <label for="loaned_on">Data wypożyczenia</label>
                <input type="date" value="2020-01-01" class="form-control" name="loaned_on">
            </div>
            <div class="form-group">
                <label for="estimated_on">Przewidywana data zwrotu</label>
                <input type="date" value="2020-01-01" class="form-control" name="estimated_on">
            </div>

            <input type="submit" value="Dodaj" class="btn btn-primary">
        </form>
    </div>
@endsection