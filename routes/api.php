<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro/create', [RegistroController::class, "store"]);
Route::get('find/sensor', [SensorController::class, "show"]);
Route::put('update/sensor', [SensorController::class, "update"]);
Route::get('/status/sensor/{codigo}', function ($codigo) {
    $sensor = Sensor::where('codigo', $codigo)->first();

    if ($sensor) {
        return response($sensor->status ? '1' : '0', 200)
            ->header('Content-Type', 'text/plain');
    }

    return response('0', 404); // ou só '0'
});
