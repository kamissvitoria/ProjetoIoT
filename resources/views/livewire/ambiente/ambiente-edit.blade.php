<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-info">
    <div class="card bg-primary-subtle shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-black fw-bold mb-4">Edição de Ambiente</h2>

        <form wire:submit.prevent='update' >
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
                    <input type="text" wire:model="descricao" class="form-control"
                        placeholder="Digite sua descrição">
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
                <!-- Botão -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn botton text-dark px-3 py-2 rounded-pill"
                        style="background-color: #8799ff"><strong> Salvar Alterações</strong></button>
                    <a href="{{ route('ambiente.list') }}"
                        class="btn button btn-secondary rounded-pill px-5 py-2"><strong>Cancelar</strong></a>
                </div>

                <!-- Mensagem de sucesso -->
                @if (session()->has('success'))
                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
        </form>
    </div>
</div>
