@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Aggiorna il fumetto: {{ $comic->title }}</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $comic->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb" value="{{ old('thumb', $comic->thumb) }}">
                @error('thumb')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $comic->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                    name="series" value="{{ old('series', $comic->series) }}">
                @error('series')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di uscita</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                    name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
                @error('sale_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="comic book" {{ old('type') === 'comic book' ? 'selected' : '' }}>Comic Book</option>
                    <option value="graphic novel" {{ old('type') === 'graphic novel' ? 'selected' : '' }}>Graphic Novel
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $comic->description) }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Invia</button>
        </form>
    </div>
@endsection
