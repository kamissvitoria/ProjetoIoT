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
        'nome' => 'required|string|max:20|min:5',
        'descricao' => 'max:255',
        'status' => 'required'
        
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'nome.max' => 'O nome deve ter no máximo 20 caracteres.',
        'nome.min' => 'O nome deve ter no mínimo 5 caracteres.',
        'descricao.max' => 'A descrição deve ter no máximo 255 caracteres.',
        'status.required'=> 'O campo é obrigatório'
    ];


    public function store()
    {

        $this->validate();

        $ambiente = Ambiente::create([
            'nome'=> $this->nome,
            'descricao'=> $this->descricao,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Cadastro realizado!');
        return redirect()->route('ambiente.list');
    }


    public function render()
    {
        return view('livewire.ambiente.ambiente-create');
    }
}