<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;


    protected $rules = [
        'ambiente_id' => 'required',
        'codigo' => 'max:100|min:2|unique:sensors,codigo',
        'tipo' => 'required',
        'descricao' => 'max:150',
        'status' => 'required',
        
    ];

    protected $messages = [
        'ambiente_id.required'=> 'O ambiente é obrigatório',
        'codigo.max' => ' O máximo de caracteres são 100.',
        'codigo.min' => 'O mínimo de caracteres são 2',
        'codigo.unique' => 'Este código já está cadastrado.',
        'tipo.required' => 'O tipo de sensor é obrigatório.',
        'descricao.max' => 'O máximo de caracteres são 150',
        'status.required' => 'O status do sensor é obrigatório.' 
    ];


    public function store()
    {

        $this->validate();


        $sensor = Sensor::create([
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status,
            'ambiente_id' => $this->ambiente_id
        ]);

        session()->flash('message', 'Cadastro realizado!');
         return redirect()->route('sensor.list');
        
    }


    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}