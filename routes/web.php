<?php

use Illuminate\Support\Facades\Route;

Route::get('/create', App\Livewire\Ambiente\AmbienteCreate::class)->name('ambientes.create');
Route::get('/list', App\Livewire\Ambiente\AmbienteList::class)->name('ambientes.list');
