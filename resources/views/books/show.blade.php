@extends('layouts/app')
@section('title')
    Lista książek
@endsection
@section('content')
    <div class="container">
        @isset($book) 
            <table class="table">
                <tr>
                    <td>Nazwa książki</td>
                    <td>{{$book->name}}</td>
                </tr>
                <tr>
                    <td>Rok wydania</td>
                    <td>{{$book->year}}</td>
                </tr>
                <tr>
                    <td>Miejsce wydania</td>
                    <td>{{$book->publication_place}}</td>
                </tr>
                <tr>
                    <td>Liczba stron</td>
                    <td>{{$book->pages}}</td>
                </tr>
                <tr>
                    <td>Cena</td>
                    <td>{{$book->price}}</td>
                </tr>
                @isset($book->isbn)
                <tr>
                    <td>Numer ISBN</td>
                    <td>{{$book->isbn->number}}</td>
                </tr>
                <tr>
                    <td>Numer ISBN wydany przez</td>
                    <td>{{$book->isbn->issued_by}}</td>
                </tr>
                <tr>
                    <td>Data wydania numeru ISBN</td>
                    <td>{{$book->isbn->issued_on}}</td>
                </tr>
                @endisset
                @isset($book->authors)
                <tr>
                    <td>Autorzy</td>
                    <td>
                        <ul>
                            @foreach ($book->authors as $author)
                                <li>{{ $author->lastname }} {{ $author->firstname }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endisset
            </table>

            <h2>Znalezione pozycje z Open Library</h2>
            @isset($docs)
                <table class="table">
                    @foreach ($docs as $doc)
                        <tr>
                            <td>Tytuł</td>
                            <td>{{ $doc->title }}</td>
                        </tr>
                        @isset($doc->author_name)
                            <tr>
                                <td>Autor</td>
                                <td>{{ $doc->author_name[0] }}</td>
                            </tr>
                        @endisset
                        @isset($doc->first_publish_year)
                            <tr>
                                <td>Data pierwszego wydania</td>
                                <td>{{ $doc->first_publish_year }}</td>
                            </tr>
                        @endisset
                        @isset($doc->publisher)
                            <tr>
                                <td>Wydawca</td>
                                <td>{{ $doc->publisher[0] }}</td>
                            </tr>
                        @endisset
                        @if(!$loop->last)
                            <tr class="table-secondary"><td colspan="2"></td></tr>
                        @endif
                    @endforeach
                </table>
            @endisset
        @else
            Brak książki.
        @endisset
    </div>
@endsection