@extends('layouts.app')

@section('titulo')
    Lista de clientes
@endsection

@section('contenido')
    <div class=" flex justify-center my-10">
        @if(session('updateClient')) {{-- Si se registro al usuario correctamente, se manda el mensaje --}}
            <p class="bg-green-500 text-white p-2 rounded-lg text-center">{{session('updateClient')}}</p>
        @endif    
        @if(session('deleteClient')) {{-- Si se registro al usuario correctamente, se manda el mensaje --}}
            <p id="deleteClient" class="bg-green-500 text-white p-2 rounded-lg text-center">{{session('deleteClient')}}</p>
        @endif    
    </div>
    <div class="overflow-x-auto flex justify-center mt-10">
        <table class="bg-white border border-gray-300 text-center" >
            <tr>
                <th class="py-2 px-4 border-b">Id</th>
                <th class="py-2 px-4 border-b" >Nombre</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Número de telefono</th>
                <th class="py-2 px-4 border-b">Edit</th>
                <th class="py-2 px-4 border-b">Delete</th>
            </tr>
            {{-- Recorrer a todos los clientes --}}
            @foreach ($clients as $client )
            <tr>
                <td class="py-2 px-4 border-b"> {{$client->id}} </td>
                <td class="py-2 px-4 border-b">{{$client->name}} </td>
                <td class="py-2 px-4 border-b">{{$client->email}} </td>
                <td class="py-2 px-4 border-b">{{$client->cell}} </td>
                {{-- Editar al cliente --}}
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('client.edit', ['client'=> $client]) }}" class="bg-yellow-300 rounded-lg p-1">Editar</a>
                </td>
                <td class="py-2 px-4 border-b">
                    <form action="{{ route('client.delete', ['client' => $client]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="bg-red-600 text-white rounded-lg p-1 hover:bg-red-400">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div>
        <nav class="flex justify-center font-bold uppercase text-gray-600 text-4xl mt-5">
            <a href="{{ route('client.view') }}" class="bg-sky-600 hover:bg-sky-700 text-white rounded-lg p-3">Registrar un nuevo cliente</a>
        </nav>
    </div>
    <script>
        // Esperar 3 segundos (3000 milisegundos) y luego ocultar el mensaje
        setTimeout(function(){
            document.getElementById('deleteClient').style.display = 'none';
        }, 3000);
    </script>
@endsection