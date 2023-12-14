@extends('layouts.app')

@section('titulo')
    Registro de un empleado nuevo
@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/perroDoctor.jpg')}}" alt="Imagen perro doctor">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-xl shadow-xl mt-10">
        <form action="{{ route('register') }}" method="POST">
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
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña</label>
                <input type="password" name="password_confirmation" placeholder="Nombre" class="border p-3 rounded-lg w-full">
                @error('password_confirmation')
                {{-- la variable $messagge es para poder tener mensajes de error dinamicos --}}
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Crear Empleado" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
            w-full p-3 text-white rounded-lg">
        </form>
        </div>

    </div>

@endsection