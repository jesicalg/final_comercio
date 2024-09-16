<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
</head>
<body>
    <div class="app">
        <div class="bg-gray-900 md:grid grid-rows-app min-h-screen">
            <nav class="sm:flex justify-between p-4 bg-green-400 bg-opacity-30 text-gray-100 items-center">
                <a class="text-2xl" href="{{route('home')}}">
                    Superserver
                </a>
                <ul class="sm:flex gap-4">
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('customer.list')}}">Listado de clientes</a>
                    </li>
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('posts.crud')}}">ABM Novedades</a>
                    </li>
                    <li>
                        <form action="{{route('auth.processLogout')}}" method="POST">
                            @csrf
                            <button>{{ auth()->user()->email }}(Cerrar Sesión)</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <main class="h-full m-auto p-4 text-white container">
                @if (Session::has('feedback.message'))
                    <div
                        class="{{Session::get('feedback.type', 'success') =='red' ? 'bg-red-400' :'bg-green-400'}}">{!! Session::get('feedback.message') !!}</div>
                @endif
                @yield('main')
            </main>
            <footer class="flex flex-col justify-center items-center bg-green-neon  text-white h-[150px] ">
                <p class=" text-xs">&#169;Superserver</p>
            </footer>
        </div>
    </div>
</body>
</html>
