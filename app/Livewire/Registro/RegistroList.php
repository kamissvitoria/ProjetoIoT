<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroList extends Component
{
    
    use WithPagination;

    public $registroId;
    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];


    public function render()
    {
         $registro = Registro::orderBy('data_hora', 'desc')
        ->orwhere('sensor_id','like',"%{$this->search}%")
        ->orwhere('valor', 'like', "%{$this->search}%")
        ->orwhere('unidade', 'like', "%{$this->search}%")
        ->orwhere('data_hora', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.registro.registro-list', compact('registro'));
    }

    public function delete($id)
    {
        $registro = Registro::findOrFail($id);
        $registro->delete();
        session()->flash('message', 'Registro deletado com sucesso.');
    }
}
