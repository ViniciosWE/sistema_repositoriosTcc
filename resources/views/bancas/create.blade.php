<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bancas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow mb-4">
        <div class="card-body">

            <h2 class="text-center mb-4 text-primary fw-bold">
                {{ isset($banca) ? 'Editar Banca' : 'Cadastrar Banca' }}
            </h2>

            <form method="POST" action="{{ isset($banca) ? route('bancas.update', $banca->id) : route('bancas.store') }}">
                @csrf
                @isset($banca)
                    @method('PUT')
                @endisset

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"
                            value="{{ $banca->nome ?? '' }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Titulação</label>
                        <input type="text" name="titulacao" class="form-control"
                            value="{{ $banca->titulacao ?? '' }}" required>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-success px-4">
                        {{ isset($banca) ? 'Atualizar' : 'Cadastrar' }}
                    </button>

                    <a href="/" class="btn btn-secondary px-4">Voltar</a>
                </div>
            </form>

        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <h4 class="mb-3 text-primary">Lista de Bancas</h4>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Titulação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($bancas as $b)
                        <tr>
                            <td>{{ $b->nome }}</td>
                            <td>{{ $b->titulacao }}</td>
                            <td>
                                <a href="{{ route('bancas.edit', $b->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('bancas.destroy', $b->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Deseja excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                Nenhuma banca cadastrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>