@extends('layouts.main')

@section('title', 'Editar | Perfil')

@section('main')

<div>
    <a href="{{url()->previous()}}">Volver</a>
    <h2 class="text-3xl font-bold my-6 text-center md:text-left md:ps-6">Editar Password</h2>
    <form class="flex flex-col items-start"  action="{{route('auth.processUpdatePassword', ['id' => auth()->user()->user_id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="newPassword">Nueva Contraseña</label>
        <input
            type="password"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('password') border-red-400 border-2 @enderror"
            name="password"
            id="newPassword"
            @error('password') aria-describedby="error-password" @enderror
            placeholder="Password"
        >
        @error('password')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-password">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>                                   
                {{ $message }}
            </div>
        @enderror
        <label for="confirmPassword">Confirmar nueva contraseña</label>
        <input
            type="password"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('password') border-red-400 border-2 @enderror"
            name="password_confirmation"
            id="confirmPassword"
            @error('password_confirmation') aria-describedby="error-password-confirmation" @enderror
            placeholder="Password"
        >
        @error('password_confirmation')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-password-confirmation">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>                                   
                {{ $message }}
            </div>
        @enderror
        <label for="floatingPassword">Actual contraseña</label>
        <input
            type="password"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('password') border-red-400 border-2 @enderror"
            name="current_password"
            id="floatingPassword"
            @error('current_password') aria-describedby="error-current-password" @enderror
            placeholder="Password"
        >
        @error('current_password')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-current-password">
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