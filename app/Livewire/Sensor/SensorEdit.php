<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{
     public $sensorId;
    public $ambienteId;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
    public $id;

    protected $rules = [
        'ambienteId' => 'required',
        'codigo' => 'required|max:100|min:2|unique:sensors,codigo',
        'tipo' => 'required',
        'descricao' => 'max:150',
        'status' => 'required',
    ];

    protected $messages = [
        'ambiente_id.required'=> 'O ambiente é obrigatório',
        'codigo.required'=>'O campo é obrigatório',
       'codigo.max' => ' O máximo de caracteres são 100.',
        'codigo.min' => 'O mínimo de caracteres são 2',
        'codigo.unique' => 'Este código já está cadastrado.',
        'tipo.required' => 'O tipo de sensor é obrigatório.',
        'descricao.max' => 'O máximo de caracteres são 150',
        'status.required' => 'O status do sensor é obrigatório.' 
    ];
    
    public function mount($id)
    {
        $sensor = Sensor::find($id);

       if ($sensor == null) {
            return redirect()->route('sensor.list');
        }

        $this->sensorId = $sensor->id;
        $this->ambienteId = $sensor->ambiente_id;
        $this->codigo = $sensor->codigo;
        $this->tipo = $sensor->tipo;
        $this->descricao = $sensor->descricao;
        $this->status = $sensor->status;
    }

    public function update(){
 $this->validate([
        'ambienteId' => 'required',
        'codigo' => 'required|max:100|min:2|unique:sensors,codigo,' . $this->sensorId,
        'tipo' => 'required',
        'descricao' => 'max:150',
        'status' => 'required',
           
        ]);

        $sensor = Sensor::find($this->sensorId);

        $sensor->ambiente_id = $this->ambienteId;
        $sensor->codigo = $this->codigo;
        $sensor->tipo = $this->tipo;
       $sensor->descricao =  $this->descricao;
       $sensor->status = $this->status;
       

        
        $sensor->save();
        
 session()->flash('success', 'Sensor atualizado');
        return redirect()->route('sensor.list');
    }
    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-edit', compact('ambientes'));
    }
}
