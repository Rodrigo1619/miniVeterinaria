<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pet;
use App\Models\Client;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('pet.register-pet', ['clients' => $clients]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'race' => 'required',
            'birth' => 'required',
            'client_id' => 'required'
        ]);
        //formateo fecha
        $data['birth'] = Carbon::createFromFormat('d/m/Y', $data['birth'])->format('Y-m-d');

        //busco que el id del cliente este en mi data
        $client = Client::findOrFail($data['client_id']);

        //si eso es asi entonces creare mi mascota, la relacion viene del metodo pets() ya que eso esta en el modelo de cliente
        $pet = $client->pets()->create([
            'name' => $data['name'],
            'race' => $data['race'],
            'birth' => $data['birth']
        ]);

        return redirect()->route('pet.view')->with('mensaje', 'Mascota registrada correctamente');
    }

    public function seePets(){
        $pets = Pet::all();
        return view('pet.see-pet', ['pets' => $pets]);
    }
    public function edit(Pet $pet){
        //debo de traer a todos los clientes tambien
        $clients = Client::all();
        return view('pet.edit-pet', ['pet'=> $pet, 'clients' => $clients]);
    }

    public function update(Pet $pet, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'race' => 'required',
            'birth' => 'required',
            'client_id' => 'required'
        ]);
        //formateo fecha
        //$data['birth'] = Carbon::createFromFormat('Y-m-d', $data['birth'])->format('d/m/Y');

        //busco que el id del cliente este en mi data
        $client = Client::findOrFail($data['client_id']);

        $pet->update($data);
        return redirect()->route('pet.see')->with("mensaje","Los datos de '{$pet->name}' se actualizaron correctamente");
    }
    public function delete(Pet $pet){
        $pet -> delete();
        return redirect()->route("pet.see")->with("mensaje","Mascota {$pet->name} eliminado");
    }
}
