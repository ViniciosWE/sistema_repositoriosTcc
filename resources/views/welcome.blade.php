<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositório de TCC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #eef2ff, #f8fafc);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* HEADER */
        .header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-bottom: 1px solid #e2e8f0;
        }

        .title {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logos img {
            height: 50px;
            margin: 0 8px;
            transition: transform 0.2s;
        }

        .logos img:hover {
            transform: scale(1.05);
        }

        .actions .btn {
            border-radius: 25px;
            padding: 8px 18px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .actions .btn-success {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
        }

        .actions .btn-dark {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border: none;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            padding: 45px 30px;
            border-radius: 18px;
            margin: 40px auto;
            text-align: center;
            max-width: 1100px;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
        }

        .hero h2 {
            font-weight: 800;
            margin-bottom: 10px;
        }

        .hero p {
            opacity: 0.9;
        }

        /* CARD MODERNO */
        .tcc-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .tcc-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #4f46e5);
        }

        .tcc-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 20px 35px rgba(0,0,0,0.12);
        }

        .tcc-title {
            font-weight: 700;
            color: #1e3a8a;
            font-size: 1.1rem;
            margin-bottom: 12px;
        }

        .meta {
            font-size: 0.9rem;
            color: #475569;
            margin-bottom: 5px;
        }

        .meta strong {
            color: #0f172a;
            font-weight: 600;
        }

        .divider {
            height: 1px;
            background: #e2e8f0;
            margin: 12px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .date {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .btn-details {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            transition: all 0.2s;
        }

        .btn-details:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.4);
        }

    </style>
</head>

<body>

    
    <div class="header">

        <div class="title">Repositório de TCC</div>

        <div class="logos">
            <img src="/img/Logo ADS.png">
            <img src="/img/Logo IFFAR .png">
        </div>

        <div class="actions">
            <a href="{{ route('tccs.create') }}" class="btn btn-success me-2">Novo TCC</a>
            <a href="{{ route('bancas.create') }}" class="btn btn-dark">Bancas</a>
        </div>

    </div>

    
    <div class="hero">
        <h2>Explore os Trabalhos de Conclusão</h2>
        <p>Visualize e gerencie os TCCs de forma organizada.</p>
    </div>

    
    <div class="container">
        <div class="row">
            @foreach($tccs as $t)
                <div class="col-md-4 mb-4">

                    <div class="tcc-card">

                        <div>
                            <div class="tcc-title">{{ $t->titulo }}</div>

                            <div class="meta"><strong>Aluno:</strong> {{ $t->aluno }}</div>
                            <div class="meta"><strong>Orientador:</strong> {{ $t->orientador }}</div>

                            <div class="divider"></div>

                            <div class="meta"><strong>Avaliador 1:</strong> {{ $t->banca1->nome }}</div>
                            <div class="meta"><strong>Avaliador 2:</strong> {{ $t->banca2->nome }}</div>
                        </div>

                        <div class="footer">
                            <div class="date">{{ $t->data->format('d/m/Y') }}</div>

                            <a href="{{ route('tccs.show', $t->id) }}" class="btn btn-details">
                                Ver detalhes
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
