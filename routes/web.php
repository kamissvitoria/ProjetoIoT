<?php

use Illuminate\Support\Facades\Route;

Route::get('ambiente/create', App\Livewire\Ambiente\AmbienteCreate::class)->name('ambiente.create');
Route::get('ambiente/list', App\Livewire\Ambiente\AmbienteList::class)->name('ambiente.list');
Route::get('ambiente/edit/{id}', App\Livewire\Ambiente\AmbienteEdit::class)->name('ambiente.edit');
