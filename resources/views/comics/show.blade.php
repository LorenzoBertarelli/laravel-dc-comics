@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between">
            <h2>Dati del fumetto {{ $comic->title }}</h2>
            <a class="btn btn-primary" href="{{ route('comics.index') }}">Torna alla lista dei fumetti</a>
        </div>

        <img class="w-20" src="{{ $comic->thumb }}" alt="">

        <ul class="list-group">
            <li class="list-group-item">
                {{ $comic['title'] }}
            </li>
            <li class="list-group-item">
                Prezzo: {{ $comic['price'] }} €
            </li>
            <li class="list-group-item">
                Tipologia: {{ $comic['type'] }}
            </li>
            <li class="list-group-item">
                Descrizione: {{ $comic['description'] }}
            </li>
            <li class="list-group-item">
                Serie: {{ $comic['series'] }}
            </li>
            <li class="list-group-item">
                Data pubblicazione: {{ $comic['sale_date'] }}
            </li>
            <li class="list-group-item">
                Tipologia: {{ $comic['type'] }}
            </li>
        </ul>

        <div class="d-flex pt-3">
            <a class="btn btn-warning mr-3" href="{{ route('comics.edit', $comic->id) }}">Modifica il fumetto</a>
            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-delete" data-comic-title={{ $comic->title }}>Cancella il
                    fumetto</button>
            </form>
        </div>

    </div>
    @include('partials.modal_delete')
@endsection
