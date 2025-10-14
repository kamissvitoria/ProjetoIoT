<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function show(Request $request){

          $sensor = Sensor::where('codigo', $request->codigo)->first(); //o first pega o primeiro registro
        if(!$sensor){ 
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }
            return response()->json([
            'success' => 'sensor encontrado!',
            'data' => $sensor
        ],201);
    }

    public function update(Request $request){
                  $sensor = Sensor::where('codigo', $request->codigo)->first(); //o first pega o primeiro registro
        if(!$sensor){ 
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        $sensor->status = !$sensor ->status;
        $sensor->save();

         return response()->json([
            'success' => 'sensor encontrado!',
            'data' => $sensor
        ],201);

    }
}
