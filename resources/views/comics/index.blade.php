@extends('layouts.app')

@section('content')
    <h2>Tutte i nostri Fumetti</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic['id'] }}</th>
                    <td>{{ $comic['title'] }}</td>
                    <td>{{ $comic['price'] }}</td>
                    <td>{{ $comic['type'] }}</td>
                    <td><a class="btn btn-success" href="{{ route('comics.show', $comic->id) }}"><i
                                class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
