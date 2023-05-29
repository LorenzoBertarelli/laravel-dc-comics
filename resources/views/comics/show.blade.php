@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dati del fumetto {{ $comic->title }}</h2>
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
    </div>
@endsection
