<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($tcc) ? 'Editar TCC' : 'Cadastrar TCC' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">
            <div class="card-body">

                <h2 class="text-center mb-4 text-primary fw-bold">
                    {{ isset($tcc) ? 'Editar TCC' : 'Cadastrar TCC' }}
                </h2>

                <form method="POST" action="{{ isset($tcc) ? route('tccs.update', $tcc) : route('tccs.store') }}"
                    enctype="multipart/form-data">

                    @csrf
                    @isset($tcc)
                        @method('PUT')
                    @endisset

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control"
                                value="{{ old('titulo', $tcc->titulo ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Aluno</label>
                            <input type="text" name="aluno" class="form-control"
                                value="{{ old('aluno', $tcc->aluno ?? '') }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Orientador</label>
                            <select name="orientador" class="form-select" required>
                                @foreach($bancas as $b)
                                    <option value="{{ $b->nome }}" {{ old('orientador', $tcc->orientador ?? '') == $b->nome ? 'selected' : '' }}>
                                        {{ $b->nome }} - {{ $b->titulacao }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Avaliador 1</label>
                            <select name="banca1_id" class="form-select" required>
                                @foreach($bancas as $b)
                                    <option value="{{ $b->id }}" {{ old('banca1_id', $tcc->banca1_id ?? '') == $b->id ? 'selected' : '' }}>
                                        {{ $b->nome }} - {{ $b->titulacao }}
                                    </option>
                                @endforeach
                            </select>

                            @error('banca1_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Avaliador 2</label>
                            <select name="banca2_id" class="form-select" required>
                                @foreach($bancas as $b)
                                    <option value="{{ $b->id }}" {{ old('banca2_id', $tcc->banca2_id ?? '') == $b->id ? 'selected' : '' }}>
                                        {{ $b->nome }} - {{ $b->titulacao }}
                                    </option>
                                @endforeach
                            </select>

                            @error('banca2_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Páginas</label>
                            <input type="number" name="paginas" class="form-control"
                                value="{{ old('paginas', $tcc->paginas ?? '') }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" name="data" class="form-control"
                                value="{{ old('data', $tcc->data ?? '') }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora" class="form-control"
                                value="{{ old('hora', $tcc->hora ?? '') }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">PDF</label>

                            @isset($tcc->arquivo_pdf)
                                <p class="mb-1">
                                    <a href="{{ asset('storage/' . $tcc->arquivo_pdf) }}" target="_blank">
                                        Ver PDF atual
                                    </a>
                                </p>
                            @endisset

                            <input type="file" name="arquivo_pdf" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Resumo</label>
                            <textarea name="resumo" class="form-control" rows="3" required>
                            {{ old('resumo', $tcc->resumo ?? '') }}
                        </textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Palavras-chave</label>
                            <input type="text" name="palavras_chave" class="form-control"
                                value="{{ old('palavras_chave', $tcc->palavras_chave ?? '') }}" required>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <button class="btn {{ isset($tcc) ? 'btn-warning' : 'btn-success' }} px-4">
                            {{ isset($tcc) ? 'Atualizar TCC' : 'Cadastrar TCC' }}
                        </button>

                        <a href="/" class="btn btn-secondary px-4">Voltar</a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>