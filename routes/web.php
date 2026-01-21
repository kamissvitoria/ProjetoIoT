<?php

use App\Http\Controllers\RegistroController;
use App\Livewire\Dashboard;

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorList;

use App\Livewire\Registro\RegistroList;

use Illuminate\Support\Facades\Route;


Route::get('ambiente/create', App\Livewire\Ambiente\AmbienteCreate::class)->name('ambiente.create');
Route::get('ambiente/list', App\Livewire\Ambiente\AmbienteList::class)->name('ambiente.list');
Route::get('ambiente/edit/{id}', App\Livewire\Ambiente\AmbienteEdit::class)->name('ambiente.edit');

Route::get('/', Dashboard::class);

Route::get('sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('sensor/list', SensorList::class)->name('sensor.list');
Route::get('sensor/edit/{id}', SensorEdit::class)->name('sensor.edit');

Route::get('registro/list', RegistroList::class)->name('registro.list');


