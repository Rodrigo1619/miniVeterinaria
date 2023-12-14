<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(!auth()->attempt($data)){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        return redirect()->route('home', auth()->user()->name);
    }
}
