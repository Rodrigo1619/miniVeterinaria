<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
}) ->name('home');

//auth
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//client
Route::get('/registerClient', [ClientController::class, 'index'])->name('client.view');
Route::get('/seeClient', [ClientController::class, 'seeClients'])->name('client.see');
Route::post('/registerClient', [ClientController::class, 'store'])->name('client.store');
Route::get('/editClient/{client}/edit', [ClientController::class,'edit'])->name('client.edit');
Route::put('/editClient/{client}/update', [ClientController::class,'update'])->name('client.update');
Route::delete('/editClient/{client}/destroy', [ClientController::class,'delete'])->name('client.delete');

//pet
Route::get('/registerPet', [PetController::class, 'index'])->name('pet.view');
Route::post('/registerPet', [PetController::class, 'store'])->name('pet.register');
Route::get('/seePets', [PetController::class, 'seePets'])->name('pet.see');
Route::get('/editPet/{pet}/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::put('/editPet/{pet}/update', [PetController::class, 'update'])->name('pet.update');
Route::delete('/editPet/{pet}/delete', [PetController::class, 'delete'])->name('pet.delete');


