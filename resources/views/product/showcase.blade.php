@extends('layouts.main')

@section('title', 'Productos')

@section('main')

    <div>
        <div class="md:flex md:items-center">
            <div class="md:w-2/4">
                <h1 class="font-bold text-3xl pb-6">El hosting que la rompe: La mejor elección para tu sitio web</h1>
                <p>
                    En Superserver, estamos comprometidos con la excelencia en el hosting. Nos esforzamos por superar tus
                    expectativas y brindarte una experiencia excepcional que te permita impulsar tu negocio en línea de
                    manera
                    exitosa.
                </p>
            </div>
            <div class="md:w-2/4">
                <img src="/imgs/bg-pricingpage.png" class="w-full max-w-md m-auto"/>
            </div>
        </div>
        <div class="bg-circle-2 bg-center bg-contain bg-no-repeat  py-20">
            <h2 class="font-bold text-3xl pb-6  mb-6">Planes y Precios</h2>
            <div class="md:flex md:gap-4">
                @foreach($products as $product)
                    <div class=" hover:shadow-lg hover:opacity-100 rounded-xl  border-2 border-gray-100 flex flex-col items-center p-4 opacity-90 ">
                        <h3 class="font-bold text-2xl">{{ $product->name  }}</h3>
                        <p class="text-xl"><span class="font-bold">AR$</span> {{ $product->price  }}</p>
                        <p>{{ $product->description  }}</p>
                        @if(Auth()->user())
                            @if(Auth()->user()->role != 'admin')
                                <form action="{{route('product.processContract')}}" method="POST">
                                    @csrf
                                    <!--TODO Pasar esto a get era muy tarde :3-->
                                    <input class="hidden" name="user_id" value="{{auth()->user()->user_id}}"/>
                                    <input class="hidden" name="product_id" value="{{$product->product_id}}"/>
                                    <button type="submit"
                                            class="bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2">
                                        Contratar
                                    </button>
                                </form>
                            @else
                                <a href="{{route('auth.formRegister')}}" class="bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2">
                                    Contratar
                                </a>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
