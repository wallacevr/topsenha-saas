<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Livewire\Guiches;
use App\Livewire\Filas;
use App\Livewire\Senhas;
use App\Livewire\ChamarSenha;
use App\Livewire\PainelSenhas;
use App\Livewire\Autoatendimento;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', \App\Livewire\Autoatendimento::class)->name('autoatendimento');
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
        Route::get('/guiches', \App\Livewire\Guiches::class)->name('guiches');
        Route::get('/filas', \App\Livewire\Filas::class)->name('filas');
        Route::get('/senhas', \App\Livewire\Senhas::class)->name('senhas');
        Route::get('/chamarsenha', \App\Livewire\ChamarSenha::class)->name('chamarsenha');
    });

    Route::get('/painel', \App\Livewire\PainelSenhas::class)->name('painel');
});

