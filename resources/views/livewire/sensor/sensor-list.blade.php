<div>
    <div class="fundo-geral py-4" style="background-color: #d5f6fd; min-height: 100vh;">
        <div class="container">

            <div class="row mb-3 align-items-center">
                <div class="col-md-6 mt-2">
                    <h2 class="fw-bold" style="color: #2c2c2c;">Lista de Sensores:</h2>
                </div>
                <div class="col-md-6 text-end mt-2">
                    <a class="btn text-white rounded-pill shadow" style="background-color: #1494fc;"
                        href="{{ route('sensor.create') }}">
                        <i class="bi bi-plus-circle"></i> <strong>Novo sensor:</strong>
                    </a>
                </div>
            </div>

            <!-- Filtro e Paginação -->
            <div class="card border-0 shadow-sm rounded-4" style="background-color: #0094f0;">
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" wire:model.debounce.300ms="search" class="form-control rounded-pill"
                                id="search" placeholder="Buscar sensores..." wire:model.live="search">
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="perPage" class="form-select rounded-pill">
                                <option value="10">10 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card border-0 shadow-sm rounded-4" style="background-color: #ffffff;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center align-middle" style="background-color: #0ba5f2;">
                                <thead style="background-color: #2323f0; color: black;">
                                    
                                    <tr>
                                        <th>ID</th>
                                        <th>codigo</th>
                                        <th>tipo</th>
                                        <th>descricao</th>
                                        <th>status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sensores as $sensor)
                                        <tr style="background-color: #97eeff;">
                                            <td>{{ $sensor->id }}</td>
                                            <td>{{ $sensor->codigo }}</td>
                                            <td>{{ $sensor->tipo }}</td>
                                            <td>{{ $sensor->descricao }}</td>
                                            <td>{{ $sensor->status }}</td>

                                            <td>
                                                <a href="{{ route('sensor.edit', $sensor->id) }}"
                                                    class="btn btn-sm rounded-pill text-white fw-bold px-3 py-1"
                                                    style="background-color: #3368ee;">Editar</a>
                                                      <button wire:click="delete({{ $sensor->id }})"
                                                class="btn btn-sm btn-danger"wire:confirm="Tem certeza que deseja excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            </td>

                                          
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Nenhum sensor encontrado.</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                {{ $sensores->links() }}
            </div>
        </div>
    </div>
</div>