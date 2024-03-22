<?php
use Illuminate\Support\Facades\Storage;
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Movie $movie*/
/** @var \App\Models\Country[]|\Illuminate\Database\Eloquent\Collection $countries*/
?>

{{-- <form action="{{route('movies.processNew')}}" method="post"> --}}
<form {{$attributes}} method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input 
            type="text" 
            id="title" 
            name="title" 
            class="form-control" 
            @error ('title') aria-describedby="error-title" @enderror
            value="{{old('title', $movie->title)}}"
            >
        @error ('title')
            <div class="text-danger" id="error-title">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="release_date" class="form-label">Fecha de estreno</label>
        <input 
            type="date"
            id="release_date"
            name="release_date"
            class="form-control"
            @error('release_date') aria-describedby="error-release_date" @enderror
            value="{{ old('release_date', $movie->release_date)}}"
            >
        @error('release_date')
            <div class="text-danger" id="error-release_date">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input 
            type="text" 
            id="price"
            name="price" 
            class="form-control"
            @error('price') aria-describedby="error-price" @enderror
            @if ($movie->title)
            value="{{ old('price', $movie->price)}}"                
            @endif
        >
        @error('price')
            <div class="text-danger" id="error-price">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="country_id" class="form-label">País de Origen</label>   
        <select 
        name="country_id" 
        id="country_id" 
        class="form-control"
        @error('country_id') aria-describedby="error-country_id"@enderror
        >
            <option value=""></option>
            @foreach ($countries as $country)
                <option 
                    value="{{$country->country_id}}"
                    @selected(old('country_id', $movie->country_id) == $country->country_id)
                    >{{$country->name}}</option>
            @endforeach
        </select> 
        @error('country_id')
            <div class="text-danger" id="error-country_id">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label">Sinopsis</label>
        <textarea 
            id="synopsis"
            name="synopsis"
            class="form-control"
            @error('synopsis') aria-describedby="error-synopsis" @enderror                
        >{{old('synopsis', $movie->synopsis)}}</textarea>
        @error('synopsis')
            <div class="text-danger" id="error-synopsis">{{$message}}</div>
        @enderror
    </div>
    @if($movie->title)
        <div class="mb-3">
            <p>Imagen actual</p>
            @if($movie->cover !== null && Storage::has('imgs/' . $movie->cover))
            <img class="img-fluid" src="{{Storage::url('imgs/' . $movie->cover)}}" alt="{{$movie->cover_description}}">
            @else
                <p>Aca estaria la imagen diciendo que no hay imagen</p> 
            @endif 
        </div>
    @endif

    <div class="mb-3">
        <label for="cover" class="form-label">Portada</label>
        <input 
            type="file"
            id="cover"
            name="cover"
            class="form-control"
            @error('cover') aria-describedby="error-cover" @enderror
        >
        @error('cover')
            <div class="text-danger" id="error-cover">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cover_description" class="form-label">Descripcion de la portada</label>
        <input 
            type="text" 
            id="cover_description" 
            name="cover_description" 
            class="form-control"
            @error('cover_description') aria-describedby="error-cover_description" @enderror
            value="{{old('cover_description', $movie->cover_description)}}"
        >
        @error('cover_description')
            <div class="text-danger" id="error-cover_description">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{$btnText}}</button>
</form>