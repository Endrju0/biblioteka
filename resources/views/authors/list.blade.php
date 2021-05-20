@extends('template')
@section('title')
    Lista autorów
@endsection
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Data urodzin</th>
                <th>Gatunki</th>
                <th>Książki</th>
            </tr>
            @forelse ($authorsList as $author)
            <tr>
                <td>{{$author->lastname}}</td>
                <td>{{$author->firstname}}</td>
                <td>{{$author->birthday}}</td>
                <td>{{$author->genres}}</td>
                @foreach ($author->books as $book)
                    <td><a href="{{ route('books.show', [$book->id]) }}">{{$book->name}}</a></td>
                @endforeach
            </tr>
            @empty
                Brak rekordów
            @endforelse
        </div>
    </table>
@endsection