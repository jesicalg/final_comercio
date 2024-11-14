@extends('layouts.main')

@section('title', 'Editar | Perfil')

@section('main')

<div>
    <a href="{{url()->previous()}}">Volver</a>
    <h2 class="text-3xl font-bold my-6 text-center md:text-left md:ps-6">Editar Perfil</h2>
    <form class="flex flex-col items-start"  action="{{route('auth.processUpdateProfile', ['id' => auth()->user()->user_id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="username">Nombre</label>
        <input
            type="text"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('username') border-red-400 border-2 @enderror"
            id="username"
            name="username"
            @error('username') aria-describedby="error-username" @enderror
            placeholder="John Doe"
            value="{{ old('username',auth()->user()->username)}}"
        >
        @error('username')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-username">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>                                   
                {{ $message }}
            </div>
        @enderror
        @if(auth()->user()->avatar)
        <div class="mb-3">
            <p>Imagen actual</p>
            @if(auth()->user()->avatar!== null && Storage::has('imgs/' . auth()->user()->avatar))
            <img class="w-28" src="{{Storage::url('imgs/' . auth()->user()->avatar)}}">
            @else
                <p>Aca estaria la imagen diciendo que no hay imagen</p> 
            @endif 
        </div>
    @endif
        <label for="avatar">Avatar</label>
        <input 
        type="file" 
        name="avatar" 
        id="avatar"
        title="avatar"
        @error('avatar') aria-describedby="error-avatar" @enderror
        >
        @error('avatar')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>                                   
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="mt-5 bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2">Guardar Cambios</button>
    </form>
</div>


@endsection