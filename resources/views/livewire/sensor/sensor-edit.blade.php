<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-info">
    <div class="card bg-primary-subtle shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-black fw-bold mb-4">Edição de Ambiente</h2>

        <form wire:submit.prevent='update'>
           <div class="mb-3">
                <label class="form-label text-text fw-semibold">codigo</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"></span>
                    <input type="text" wire:model="codigo" class="form-control" placeholder="Digite o codigo">
                </div>
                @error('codigo')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
                        <div class="mb-3">
                <label class="form-label text-text fw-semibold">Tipo</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"></span>
                    <input type="text" wire:model="tipo" class="form-control" placeholder="Digite o tipo">
                </div>
                @error('tipo')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
                        <div class="mb-3">
                <label class="form-label text-text fw-semibold">descricao</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"></span>
                    <input type="text" wire:model="descricao" class="form-control" placeholder="Digite sua descricao">
                </div>
                @error('descricao')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
                     <option selected>Ambiente</option>
                        <select class="form-select" aria-label="Default select example" wire:model.defer='ambiente_id' id="ambiente_id">
                         <option selected>Ambiente</option>
                        @foreach ($ambientes as $a)
                        <option value="{{$a->id}}">{{$a->nome}}</option>
                        @endforeach
                        </select>
            <div class="col text-start">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select id="status" class="form-select rounded-pill px-3" wire:model.defer="status">
                        <option selected>Selecione o status:</option>
                        <option value='1'>Ativo</option>
                        <option value='0'>Desativado</option>
                    </select>
                    @error('status')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
              <div class="text-center mt-4">
                    <button type="submit" class="btn botton text-dark px-3 py-2 rounded-pill"
                        style="background-color: #8799ff"><strong> Salvar Alterações</strong></button>
                    <a href="{{ route('sensor.list') }}"
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

    </div>>
</div>
