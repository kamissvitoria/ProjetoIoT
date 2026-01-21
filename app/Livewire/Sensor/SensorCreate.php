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
        'codigo' => 'required|unique:sensors,codigo',
        'tipo' => 'required',
        'descricao' => 'required'
    ];

    protected $messages = [
        'ambiente_id.required' => 'O campo é obrigatório',
        'codigo.required' => 'O campo é obrigatório',
        'codigo.unique' => 'O campo é único',
        'tipo.required' => 'O campo é obrigatório',
        'descricao.required' => 'O campo é obrigatório'
    ];

    public function salvar() 
    {
        Sensor::create([
            'ambiente_id'=>$this->ambiente_id,
            'codigo'=>$this->codigo,
            'tipo'=>$this->tipo,
            'descricao'=>$this->descricao,
            'status'=>$this->status
        ]);

        session()->flash('success', 'Cadastro realizado com sucesso!');
        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
