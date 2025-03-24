<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Guiches;
use App\Livewire\Filas;
use App\Livewire\Senhas;
use App\Livewire\ChamarSenha;
use App\Livewire\PainelSenhas;


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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/guiches', Guiches::class)->name('guiches');
    Route::get('/filas', Filas::class)->name('filas');
    Route::get('/senhas', Senhas::class)->name('senhas');
    Route::get('/chamarsenha', ChamarSenha::class)->name('chamarsenha');
    Route::get('/painel', PainelSenhas::class)->name('painel');
});
