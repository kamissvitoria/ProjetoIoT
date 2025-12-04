<?php

namespace App\Livewire\ListStatus;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class ListStatusCreate extends Component
{ 
    use WithPagination;

    public $search = '';
    // Ajustado para 10, que é o valor padrão no seu HTML.
    public $perPage = 10; 

    // Propriedade para armazenar e sincronizar o status de cada sensor.
    public $sensorStatus = []; 

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10], // Ajustado
    ];
    
    // Método para inicializar o estado dos toggles ao carregar a página
    public function mount()
    {
        // Pega todos os IDs e status para inicializar o array $sensorStatus
        $sensors = Sensor::select('id', 'status')->get();
        foreach ($sensors as $sensor) {
            // Converte para booleano para o Livewire gerenciar corretamente o checkbox
            $this->sensorStatus[$sensor->id] = (bool) $sensor->status; 
        }
    }

    // Método chamado quando o switch é alterado (wire:change)
    public function toggleStatus($id)
    {
        // 1. Encontra o sensor no banco de dados
        $sensor = Sensor::findOrFail($id);
        
        // 2. O Livewire já atualizou $this->sensorStatus[$id] com o novo valor.
        $newStatus = $this->sensorStatus[$id] ?? false;
        
        // 3. Salva o novo status no banco de dados
        $sensor->status = $newStatus;
        $sensor->save();

        // Opcional: feedback para o usuário
        session()->flash('message', 'Status do sensor ' . $sensor->codigo . ' atualizado com sucesso!');
    }

    public function render()
    {
        // Corrigida a lógica de busca para evitar 'like' em colunas booleanas (status)
        $sensores = Sensor::query()
            ->when($this->search, function ($query) {
                // Filtra por código, tipo e descrição
                $query->where('codigo', 'like', "%{$this->search}%")
                      ->orWhere('tipo', 'like', "%{$this->search}%")
                      ->orWhere('descricao', 'like', "%{$this->search}%");

                // Filtra por status se o termo de busca for "ativo" ou "inativo"
                $searchLower = strtolower($this->search);
                if (str_contains('ativo', $searchLower)) {
                    $query->orWhere('status', 1);
                } elseif (str_contains('inativo', $searchLower)) {
                    $query->orWhere('status', 0);
                }
            })
            ->paginate($this->perPage);

        return view('livewire.list-status.list-status-create', compact('sensores'));
    }
    
    public function delete($id)
    {
        Sensor::findOrFail($id)->delete();
        session()->flash('message', 'Sensor deletado com sucesso');
        
        // Remove o status do sensor deletado do array Livewire
        if (isset($this->sensorStatus[$id])) {
            unset($this->sensorStatus[$id]);
        }
        
        // Redefine a paginação
        $this->resetPage();
    }
}