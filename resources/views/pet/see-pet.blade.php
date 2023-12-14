@extends('layouts.app')

@section('titulo')
    Lista de mascotas
@endsection

@section('contenido')
    <div class=" flex justify-center my-10">
        @if(session('mensaje')) {{-- Si se registro al usuario correctamente, se manda el mensaje --}}
            <p class="bg-green-500 text-white p-2 rounded-lg text-center">{{session('mensaje')}}</p>
        @endif  
    </div>
    <div class="overflow-x-auto flex justify-center mt-10">
        <table class="bg-white border border-gray-300 text-center">
            <tr>
                <th class="py-2 px-4 border-b">Id</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Raza</th>
                <th class="py-2 px-4 border-b">Fecha de nacimiento</th>
                <th class="py-2 px-4 border-b">Propietario</th>
            </tr>

            @foreach ($pets as $pet)
                
            <tr>
                <td class="py-2 px-4 border-b">{{$pet->id}}</td>
                <td class="py-2 px-4 border-b">{{$pet->name}}</td>
                <td class="py-2 px-4 border-b">{{$pet->race}}</td>
                <td class="py-2 px-4 border-b">{{$pet->birth}}</td>
                <td class="py-2 px-4 border-b">{{$pet->client->name}}</td>
                {{-- Editar al cliente --}}
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('pet.edit', ['pet'=> $pet])  }}" class="bg-yellow-300 rounded-lg p-1">Editar</a>
                </td>
                <td class="py-2 px-4 border-b">
                    <form action=" {{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="bg-red-600 text-white rounded-lg p-1 hover:bg-red-400">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection