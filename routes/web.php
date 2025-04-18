<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/cadastro', [LandingController::class, 'cadastro'])->name('cadastro');
Route::get('/quem-somos', [LandingController::class, 'quemSomos'])->name('quem-somos');
Route::get('/duvidas-frequentes', [LandingController::class, 'faq'])->name('faq');