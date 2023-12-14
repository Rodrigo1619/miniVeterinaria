@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')
@auth
<nav class=" flex flex-col mt-10">
    <div class="grid grid-cols-2 items-center m-5 ">
        <div class="flex gap-10" >
            <a href="{{route('client.view')}}" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
            p-3 text-white rounded-lg h-[30%] my-20">Registrar nuevo cliente</a>
            <img src="{{asset('img/cliente.webp')}}" alt="Imagen nuevo cliente" class="w-[50%] rounded-xl">
        </div>
        <div class="flex gap-10" >
            <a href="{{route('client.see')}}" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
            p-3 text-white rounded-lg h-[30%] my-20">Ver clientes</a>
            <img src="{{asset('img/clientes.jpg')}}" alt="Imagen nuevo cliente" class="w-[50%] rounded-xl">
        </div>

    </div>
    <div class="grid grid-cols-2 items-center m-5 ">
        <div class="flex gap-10" >
            <a href="{{route('pet.view')}}" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
            p-3 text-white rounded-lg h-[30%] my-20">Registrar nueva mascota</a>
            <img src="{{asset('img/nuevaMascota.webp')}}" alt="Imagen nuevo cliente" class="w-[50%] rounded-xl">
        </div>
        <div class="flex gap-10" >
            <a href="{{route('pet.see')}}" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
            p-3 text-white rounded-lg h-[30%] my-20">Ver mascotas</a>
            <img src="{{asset('img/mascotas.jpg')}}" alt="Imagen nuevo cliente" class="w-[50%] rounded-xl">
        </div>

    </div>
</nav>
@endauth
@endsection