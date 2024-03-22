<?php
use Illuminate\Support\Facades\Storage;
/** @var \App\Models\Movie $movie */
?>
<section>
    <div class="d-flex flex-row-reverse gap-4 mb-4">
        <div class="col-9">
            <h1>{{$movie->title}}</h1>
            <dl>
                <dt>Precio</dt>
                <dd>$ {{$movie->price}}</dd>
                <dt>Fecha de estreno</dt>
                <dd>{{$movie->release_date}}</dd>
                <dt>País de Origen</dt>
                <dd>{{$movie->country->name}} ({{$movie->country->alpha3}})</dd>
            </dl>
        </div>
        <div class="col-3">
            {{-- @if($movie->cover !== null && file_exists(public_path('imgs/' . $movie->cover)))
                <img class="img-fluid" src="{{url('imgs/' . $movie->cover)}}" alt="{{$movie->cover_description}}">
            @else
                <p>Aca estaria la imagen diciendo que no hay imagen</p> 
            @endif        --}}
        @if($movie->cover !== null && Storage::has('imgs/' . $movie->cover))
            <img class="img-fluid" src="{{Storage::url('imgs/' . $movie->cover)}}" alt="{{$movie->cover_description}}">
        @else
            <p>Aca estaria la imagen diciendo que no hay imagen</p> 
        @endif  
        </div>
    </div>
    <h2 class="mb-3">Sinopsis</h2>
    <p>{{$movie->synopsis}}</p>
</section>