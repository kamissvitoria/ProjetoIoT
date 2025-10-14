<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;
use LDAP\Result;

class RegistroController extends Controller
{
    //não precisa pq já tenho o livewire registro list, porém é bom anotar
    public function index(){
        $registros = Registro::orderBy('id', 'desc')->get();
        return response()->json($registros,200);
    }

     public function store(RegistroRequest $request) 
    {
        $sensor = Sensor::where('codigo', $request->cod_sensor)->first(); //o first pega o primeiro registro
        
        if(!$sensor){ //mesma coisa que sensor == false
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        $registro = Registro::create([
            'sensor_id'=> $sensor->id,
            'valor' => $request->valor,
            'unidade' => $request->unidade,
            'data_hora'=> now() //pega a data e hora de agora
        ]);

        return response()->json([
            'success' => 'registro salvo com sucesso',
            'data' => $registro
        ],201);
    }   
}