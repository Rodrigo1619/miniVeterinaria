@extends('layouts.app')

@section('titulo')
    Registrar nueva mascota
@endsection

@section('contenido')
<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/gatoDoctor.jpg')}}" alt="Imagen registro cliente">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-xl shadow-xl mt-10">
        @if(session('mensaje')) {{-- Si se registro al usuario correctamente, se manda el mensaje --}}
            <p class="bg-green-500 text-white p-2 rounded-lg text-center">{{session('mensaje')}}</p>
        @endif
        
    <form action="{{ route('pet.register') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre completo</label>
            <input type="text" name="name" placeholder="Nombre" class="border p-3 rounded-lg w-full 
            @error('name')
                border-red-600
            @enderror"
            value="{{old('name')}}">
            @error('name')
                {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
            
        </div>
        <div class="mb-5">
            <label for="race" class="mb-2 block uppercase text-gray-500 font-bold">Raza</label>
            <input type="text" name="race" placeholder="Raza" class="border p-3 rounded-lg w-full
            @error('race')
                border-red-600
            @enderror"
            value="{{old('race')}}">
            @error('race')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
            
        </div>
        <div class="mb-5">
            <label for="birth" class="mb-2 block uppercase text-gray-500 font-bold">Fecha de nacimiento</label>
            <input type="text" name="birth" placeholder="dd/mm/aaaa" class="border p-3 rounded-lg w-full
            @error('birth')
                border-red-600
            @enderror"
            value="{{old('birth')}}">
            @error('birth')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="client_id" class="mb-2 block uppercase text-gray-500 font-bold">Cliente</label>
            <select name="client_id" class="border p-3 rounded-lg w-full">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>
        <input type="submit" value="Registrar mascota" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
        w-full p-3 text-white rounded-lg">
    </form>
</div>

</div>
<div>
        <nav class="flex justify-center font-bold uppercase text-gray-600 text-4xl mt-5">
            <a href="{{ route('pet.see') }}" class="bg-sky-600 hover:bg-sky-700 text-white rounded-lg p-3">Ver a todas las mascotas</a>
        </nav>
</div>
@endsection