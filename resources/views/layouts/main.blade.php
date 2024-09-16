<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Superserver</title>
    <!-- Styles -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    
    @vite('resources/css/app.css')

</head>
<body>
    <div class="app">
        <div class="bg-gray-900 md:grid grid-rows-app min-h-screen">
            <nav class="sm:flex justify-between p-4 bg-gray-400 bg-opacity-30 text-gray-100 items-center">
                <a class="text-2xl" href="{{route('home')}}">
                    <img class=" w-52" src="/imgs/logo.svg" :alt="`Superserver`"/>
                </a>
                
                <ul class="sm:flex gap-4">
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('product.showcase.view')}}">Web Hostings</a>
                    </li>
                    <li>
                        <a class="block py-2 sm:p-0" href="{{route('posts')}}">Novedades</a>
                    </li>
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <li>
                                <a class="block py-2 sm:p-0" href="{{route('customer.list')}}">Panel de control</a>
                            </li>
                        @endif
                        <li>
                            <a class="block py-2 sm:p-0" href="{{route('auth.viewProfile')}}">Perfil</a>
                        </li>
                        <li>
                            <form action="{{route('auth.processLogout')}}" method="POST">
                                @csrf
                                <button>{{ auth()->user()->email }}(Cerrar Sesión)</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a class="block py-2 sm:p-0" href="{{route('auth.formLogin')}}">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a class="block py-2 sm:p-0" href="{{route('auth.formRegister')}}">Registrar</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <main class=" m-auto p-4 text-white container">
                @if (Session::has('feedback.message'))
                    <div class="{{Session::get('feedback.type', 'success') =='red' ? 'bg-red-400' :'bg-green-400'}} rounded-lg px-6 py-2 mb-2">{!! Session::get('feedback.message') !!}</div>
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
