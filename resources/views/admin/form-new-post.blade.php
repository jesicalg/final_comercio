@extends('layouts.admin')
@section('title', 'Tablero - ABM Novedades')

@section('main')

    <!--TODO cambiar titulo entre crear y editar automaticamente-->
    <h1 class="text-3xl font-bold mb-4">Nuevo</h1>
    <form action="{{route('admin.processPost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="id_name">Titulo</label>
        <input name="title" id="id_name"
               class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('title') border-red-400 border-2 @enderror"
               type="text"
        />
        <label for="id_content">Contenido</label>
        <textarea name="content" id="id_content"
                  class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('content') border-red-400 border-2 @enderror"
                  type="text"
        ></textarea>
        <label for="id_author">Autor</label>
        <input name="author" id="id_author"
               class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('author') border-red-400 border-2 @enderror"
               type="text"
        />
        <label for="id_category">Categoria</label>
        <select name="category_id" id="id_category"
                class="mb-2 border border-gray-400 rounded p-2 w-full text-slate-800 @error('category_id') border-red-400 border-2 @enderror"
        >
            @foreach($categories as $category)
                <option value="{{$category->category_id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <label for="id_picture">Imagen del post</label>
        <input
            type="file"
            id="id_picture"
            name="picture"
            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            @error('picture') aria-describedby="border-red-400 border-2" @enderror
        >
        <button type="submit"
                class="mt-5 bg-green-800 transition-colors text-white p-2 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-800 rounded mt-2">
            Guardar
        </button>
    </form>
@endsection
