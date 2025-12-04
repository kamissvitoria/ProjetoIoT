<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{
     public $ambienteId;
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

    public function mount($id)
    {

        $ambiente = Ambiente::find($id);
        if ($ambiente == null) {
            session()->flash('error', 'Ambiente não encontrado');
            return redirect()->route('ambiente.list');
        }
        $this->ambienteId = $ambiente->id;
            $this->nome = $ambiente->nome;
            $this->descricao = $ambiente->descricao;
            $this->status = $ambiente->status;

    }


    public function update()
    {


        $ambiente = Ambiente::find($this->ambienteId);

        $ambiente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);


        session()->flash('message', 'ambiente atualizado com sucesso!');
        return redirect()->route('ambiente.list');

    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-edit');
    }
}
