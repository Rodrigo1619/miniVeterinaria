@extends('layouts.app')

@section('titulo')
    Iniciar sesión
@endsection

@section('contenido')
<div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/loginperro.jpg')}}" alt="Imagen login perro">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-xl shadow-xl mt-10">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        {{-- Se debe crear la sesion y si se mete credenciales incorrectas se le dice al usuario --}}
        @if(session('mensaje'))
            <p class="bg-red-600 p-2 rounded-lg text-white text-center ">{{session('mensaje')}}</p>
        @endif
        
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <input type="text" name="email" placeholder="Nombre" class="border p-3 rounded-lg w-full
            @error('email')
                border-red-600
            @enderror"
            value="{{old('email')}}">
            @error('email')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
            
        </div>
        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
            <input type="password" name="password" placeholder="Nombre" class="border p-3 rounded-lg w-full">
            @error('password')
            {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
        </div>
        
        <input type="submit" value="Iniciar sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
        w-full p-3 text-white rounded-lg">
    </form>
</div>

</div>
@endsection