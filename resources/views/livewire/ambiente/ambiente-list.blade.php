<div>
    <div class="fundo-geral py-4" style="background-color: #eee1d5; min-height: 100vh;">
        <div class="container">

        <div class="row mb-3 align-items-center">
            <div class="col-md-6 mt-2">
                <h2 class="fw-bold" style="color: #2c2c2c;">Lista de Ambientes:</h2>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4" style="background-color: #fdf5ef;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center align-middle" style="background-color: #fff4dc;">
                        <thead style="background-color: #f0b923; color: black;">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>DESCRICAO</th>
                                <th>STATUS</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ambiente as $a)
                                <tr style="background-color: #fff5e9;">
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->nome }}</td>
                                    <td>{{ $a->descricao }}</td>
                                    <td>{{ $a->status }}</td>

                                    <td>
                                        <a href="{{ route('ambiente.edit', $a->id) }}"
                                            class="btn btn-sm rounded-pill text-white fw-bold px-3 py-1"
                                            style="background-color: #e0b650;">Editar</a>
            </div>
        </div>
    </div>
    </div>      
</div>           