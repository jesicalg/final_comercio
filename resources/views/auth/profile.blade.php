@extends('layouts.main')

@section('title', 'Perfil')

@section('main')
<div class="md:w-1/3">
    <div class="flex items-center">
        @if (auth()->user()->avatar)
        <img class="aspect-square rounded-full object-cover object-center border-4 border-green-neon bg-white/50 " src="imgs/{{auth()->user()->avatar}}" alt="Imagen de perfil">
        @else
        <img class="w-28 aspect-square rounded-full object-cover object-top border-4 border-green-neon bg-white/50 p-2" src="imgs/user.svg" alt="Imagen de perfil">
        @endif
    
        <h2 class="text-3xl font-bold my-6 text-center md:text-left md:ps-6">{{ auth()->user()->username ? auth()->user()->username : auth()->user()->email  }}</h2>
    </div>
    <div class="flex flex-col items-stretch w-60 pt-6">
        <a class="m-1 text-center bg-green-neon transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded " href="">Editar Perfil</a>
        <a href="" class="m-1 text-center bg-green-neon transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded ">Cambiar contraseña e email</a>
    </div>
</div>
<div class="md:w-2/3">
     <h2>Subscripcion contratada</h2>
     
     <div class="flex items-center content-center">
        <p>No tienes ninguna suscripción aún</p>
     </div>
</div>


@endsection