<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
    public $nome;
    public $descricao;
    public $status;
    
    protected $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string|max:255'
    ];

    protected $messages = [
        'nome.required' => 'Este campo é obrigatório',
        'nome.max' => 'Você ultrapassou o limite de caracteries',
        'nome.string' => 'O campo deve conter apenas 255 letras ',
        'descricao.required' => 'Este campo é obrigatório',
        'descricao.max' => 'Você ultrapassou o limite de caracteries',
        'descricao.string' => 'O campo deve conter apenas 255 letras ',
    ];

    public function salvar(){
        $this->validate();

        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

    }
    public function render()
    {
        
        return view('livewire.ambiente.ambiente-create');
    }
}
