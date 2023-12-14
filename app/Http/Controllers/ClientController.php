<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('client.register-client');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cell' => 'required|digits:8'
        ]);
        
        //creamos cliente
        Client::create($data);
        return redirect()->route('client.view')->with('mensaje', 'Cliente registrado correctamente');
    }
    public function seeClients(){
        $clients = Client::all();
        return view('client.see-Clients', ['clients' => $clients]);
    }
    public function edit(Client $client){
        return view('client.edit-client', ['client' => $client]);
    }
    public function update(Client $client, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cell' => 'required|digits:8'
        ]);
        $client->update($data);
        return redirect()->route('client.see')->with('updateClient', "Los datos de'{$client->name}' fueron actualizados correctamente");
    }
    public function delete(Client $client){
        $client->delete();
        return redirect()->route('client.see')->with('deleteClient', "El cliente '{$client->name}' fue eliminado correctamente'");
    }



}
