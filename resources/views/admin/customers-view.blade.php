@extends('layouts.admin')
@section('title', 'Tablero - Lista de clientes')

@section('main')
    <h2 class="text-3xl font-bold my-6 text-center md:text-left">Clientes</h2>
    <div class="border border-gray-300  rounded-2xl px-4">
        @foreach($customers as $customer)
            <ul class="border-b border-gray-200 md:flex justify-between px-1 py-4">
                <li>
                    {{ $customer->email }}
                    <p class="text-sm text-gray-500">Price: {{ $customer->price }}</p>
                </li>
                <li>
                    {{ $customer->name }}
                    <p class="text-sm text-gray-500">Con nosotros desde: {{ $customer->created_at }}</p>
                </li>
            </ul>
        @endforeach
    </div>
@endsection
