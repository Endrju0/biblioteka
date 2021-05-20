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
                    <form id="delform" action="{{ route('books.destroy', [$book->id]) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a href="#" onclick="document.getElementById('delform').submit();">Usuń</a>
                    </form>
                </td>
                {{-- <td><a href="{{ url("/books/$book->id/edit") }}">Edycja</a></td> --}}
            </tr>
            @empty
                Brak rekordów
            @endforelse
        </div>
    </table>
@endsection