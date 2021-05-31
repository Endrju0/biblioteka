@extends('template')
@section('title')
    Lista książek
@endsection
@section('content')
    <div class="container">
        <table class="table">
            @forelse ($booksList as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->year}}</td>
                <td>{{$book->publication_place}}</td>
                <td><a href="{{ url('/books', [$book->id]) }}">Podgląd</a></td>
                <td><a href="{{ route('books.edit', [$book->id]) }}">Edycja</a></td>
                <td>
                    <form id="delform-{{$book->id}}" action="{{ route('books.destroy', [$book->id]) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a href="#" onclick="document.getElementById('delform-{{$book->id}}').submit();">Usuń</a>
                    </form>
                </td>
            </tr>
            @empty
                Brak rekordów
            @endforelse
        </div>
    </table>
@endsection