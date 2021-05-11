@extends('books.template')
@section('title')
    Lista książek
@endsection
@section('content')
    <div class="container">
        {{-- {{ $booksList }} --}}
        @forelse ($booksList as $book)
            Tu będą dane książki
        @empty
            Brak rekordów
        @endforelse
    </div>
@endsection