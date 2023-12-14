@extends('layouts.app')

@section('titulo')
    Editar datos del cliente
@endsection

@section('contenido')
<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/registroCliente.png')}}" alt="Imagen registro cliente">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-xl shadow-xl mt-10">
        @if(session('mensaje')) {{-- Si se registro al usuario correctamente, se manda el mensaje --}}
            <p class="bg-green-500 text-white p-2 rounded-lg text-center">{{session('mensaje')}}</p>
        @endif
    <form action="{{ route('client.update', ['client'=> $client]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre completo</label>
            <input type="text" name="name" placeholder="Nombre" class="border p-3 rounded-lg w-full 
            @error('name')
                border-red-600
            @enderror"
            value="{{$client->name}}">
            @error('name')
                {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
            
        </div>
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <input type="text" name="email" placeholder="correo@correo.com" class="border p-3 rounded-lg w-full
            @error('email')
                border-red-600
            @enderror"
            value="{{$client->email}}">
            @error('email')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
            
        </div>
        <div class="mb-5">
            <label for="cell" class="mb-2 block uppercase text-gray-500 font-bold">Número de telefono</label>
            <input type="tel" name="cell" placeholder="12345678" class="border p-3 rounded-lg w-full
            @error('cell')
                border-red-600
            @enderror"
            value="{{$client->cell}}">
            @error('cell')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
        </div>
        <input type="submit" value="Actualizar cliente" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
        w-full p-3 text-white rounded-lg">
    </form>
</div>
@endsection