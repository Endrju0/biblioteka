@extends('template')
@section('title')
    Lista wypożyczeń
@endsection
@section('content')
    @if ($loansList->isNotEmpty())
    <div class="container">
        <table class="table">
            <tr>
                <th>Nazwa książki</th>
                <th>Data wypożyczenia</th>
                <th>Data planowanego zwrotu</th>
                <th>Data zwrotu</th>
                <th>Dane klienta</th>
            </tr>
            @foreach ($loansList as $loan)
            <tr>
                <td>{{$loan->book->name}}</td>
                <td>{{$loan->loaned_on}}</td>
                <td>{{$loan->estimated_on}}</td>
                <td>{{$loan->returned_on}}</td>
                <td>{{$loan->client}}</td>
            </tr>
            @endforeach
        </div>
    </table>
    @else
        Brak rekordów
    @endif
@endsection