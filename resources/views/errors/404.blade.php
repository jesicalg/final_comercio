@extends('layouts.main')

@section('title', ('Página no encontrada'))
@section('main')
<h1>Página no encontrada</h1>
<p>Vuelve <a class="text-blue-400 underline" href="{{route('home')}}">al inicio.</a></p>
@endsection

