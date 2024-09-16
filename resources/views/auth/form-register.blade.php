@extends('layouts.main')
@section('title', 'Registrarse')

@section('main')
<div>
    <h1 class="text-4xl mb-4">Registrarse</h1>
    <form action="{{ route('auth.processRegister') }}" method="POST">
        @csrf
        <label for="floatingInput">Email</label>
        <input
            type="email"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('email') border-red-400 border-2 @enderror"
            id="floatingInput"
            name="email"
            @error('email') aria-describedby="error-email" @enderror
            placeholder="name@example.com"
            value="{{ old('email')}}"
        >
        @error('email')
            <div class="text-red-500 text-xs font-medium flex items-center" id="error-email">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>                                   
                {{ $message }}
            </div>
        @enderror
        <label for="floatingPassword">Password</label>
        <input
            type="password"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('password') border-red-400 border-2 @enderror"
            name="password"
            id="floatingPassword"
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
        <button
            class="mt-5 bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2"
            type="submit">
            Registrarse
        </button>
    </form>
</div>
@endsection
