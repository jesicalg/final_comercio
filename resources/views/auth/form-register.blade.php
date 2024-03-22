@extends('layouts.main')
@section('title', 'Registrarse')

@section('main')
    <h1 class="text-4xl mb-4">Registrarse</h1>
    <form action="{{ route('auth.processRegister') }}" method="POST">
        @csrf
        <label for="floatingInput">Email</label>
        <input
            type="email"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('email') border-red-400 border-2 @enderror"
            id="floatingInput"
            name="email"
            placeholder="name@example.com"
        >
        <label for="floatingPassword">Password</label>
        <input
            type="password"
            class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('password') border-red-400 border-2 @enderror"
            name="password"
            id="floatingPassword"
            placeholder="Password"
        >
        <button
            class="mt-5 bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2"
            type="submit">
            Registrarse
        </button>
    </form>
@endsection
