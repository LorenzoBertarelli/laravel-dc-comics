@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between p-3">
        <h2>Tutte i nostri Fumetti</h2>

        <a class="mt-2" href="{{ route('comics.create') }}">Crea un nuovo fumetto</a>
    </div>


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
                    <td class="inline-block">
                        <a class="btn btn-success" href="{{ route('comics.show', $comic->id) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-warning" href="{{ route('comics.edit', $comic->id) }}"><i
                                class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Sei sicuro di voler eliminare questo elemento?');
        }
    </script>
@endsection
