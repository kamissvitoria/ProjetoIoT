<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-info">
    <div class="card bg-primary-subtle shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-black fw-bold mb-4">Cadastro de Ambiente</h2>

        <form wire:submit.prevent="salvar">
            <!-- Nome -->
            <div class="mb-3">
                <label class="form-label text-text fw-semibold">Nome</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"></span>
                    <input type="text" wire:model="nome" class="form-control" placeholder="Digite o nome">
                </div>
                @error('nome')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
                <div class="mb-3">
                    <label class="form-label text-black fw-semibold">Descricao</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"></span>
                        <input type="text" wire:model="descricao" class="form-control" placeholder="Digite sua descrição">
                    </div>
                    @error('descricao')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col text-start">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select id="status" class="form-select rounded-pill px-3" wire:model.defer="status">
                        <option selected>Selecione o status:</option>
                        <option value='1'>Ativo</option>
                        <option value='2'>Desativado</option>
                    </select>
                    @error('status')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
        
            <div class="mb-3 text-center">
                <button type="submit" class="btn fw-bold text-dark rounded-pill px-5 py-2"
                    style="background-color: #8799ff;"> Cadastrar
                </button>
            </div>
    </div>
    </div>