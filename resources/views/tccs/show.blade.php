<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do TCC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #eef2ff, #f8fafc);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 900px;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
        }

        .card-body {
            padding: 30px;
        }

        h2 {
            font-weight: 800;
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .info p {
            margin-bottom: 8px;
            color: #334155;
        }

        .info strong {
            color: #0f172a;
        }

        .resumo {
            background: #f1f5f9;
            padding: 15px;
            border-radius: 12px;
            margin-top: 10px;
        }

        .btn {
            border-radius: 20px;
            font-weight: 600;
            padding: 6px 16px;
        }

        .btn-success {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
        }

        .btn-warning {
            background: linear-gradient(135deg, #facc15, #eab308);
            border: none;
            color: #000;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #64748b, #475569);
            border: none;
        }

    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="card shadow-lg border-0">
            <div class="card-body">

                <h2 class="mb-4">📘 {{ $tcc->titulo }}</h2>

                <div class="info">
                    <p><strong>👨‍🎓 Aluno:</strong> {{ $tcc->aluno }}</p>
                    <p><strong>👨‍🏫 Orientador:</strong> {{ $tcc->orientador }}</p>
                    <p><strong>🧑‍⚖️ Avaliador 1:</strong> {{ $tcc->banca1->nome}}</p>
                    <p><strong>🧑‍⚖️ Avaliador 2:</strong> {{ $tcc->banca2->nome}}</p>
                    <p><strong>📅 Data:</strong> {{ $tcc->data->format('d/m/Y') }}</p>
                    <p><strong>⏰ Horário:</strong> {{ $tcc->hora }}</p>
                    <p><strong>📄 Páginas:</strong> {{ $tcc->paginas }}</p>
                </div>

                <div class="mt-3">
                    <strong>📝 Resumo:</strong>
                    <div class="resumo">{{ $tcc->resumo }}</div>
                </div>

                <p class="mt-3"><strong>🔑 Palavras-chave:</strong> {{ $tcc->palavras_chave }}</p>

                <div class="mt-4 d-flex gap-2 flex-wrap">

                    @if($tcc->arquivo_pdf)
                        <a href="{{ asset('storage/' . $tcc->arquivo_pdf) }}" target="_blank" class="btn btn-success">
                            📄 Ver PDF
                        </a>
                    @endif

                    <a href="{{ route('tccs.edit', $tcc->id) }}" class="btn btn-warning">
                        ✏️ Editar
                    </a>

                    <form method="POST" action="{{ route('tccs.destroy', $tcc->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Deseja excluir?')">🗑️ Excluir</button>
                    </form>

                    <a href="/" class="btn btn-secondary">
                        ⬅️ Voltar
                    </a>

                </div>

            </div>
        </div>

    </div>

</body>

</html>