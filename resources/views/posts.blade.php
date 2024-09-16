@extends('layouts.main')

@section('title','Novedades')

@section('main')
    <h2 class="text-3xl font-bold my-6 text-center md:text-left">¡Novedades!</h2>
    <ul class="mt-6 w-xl flex flex-col items-center">
        @foreach($posts as $post)
            <li class="w-full mb-5 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                @if($post->picture == null)
                    <img class="opacity-25 object-cover w-96 aspect-square rounded-t-lg h-96 md:h-auto md:rounded-none md:rounded-l-lg"
                         src="/imgs/not-image.svg" alt=""
                    >
                @else
                    <img class=" w-full md:w-1/3 object-cover aspect-square rounded-t-lg h-96 md:h-auto md:rounded-none md:rounded-l-lg"
                         src="{{ Storage::url('imgs/' . $post->picture) }}" alt=""
                    >
                @endif
                <div class="flex flex-col justify-between p-4 leading-normal w-full md:w-2/3">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $post->content }}
                    </p>
                    <p class="text-right text-sm text-gray-400"> {{ $post->author }}</p>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
