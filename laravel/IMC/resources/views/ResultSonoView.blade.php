<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualidade de Sono</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Resultado da qualidade de seu sono:</h2>

        <div class="resultado">
            <p><strong>Idade:</strong> {{ $idade }} anos</p>
            <p><strong>Meses:</strong> {{ $mes ?? 'N/A' }}</p>
            <p><strong>Horas Dormidas:</strong> {{ $horas }} horas</p>
            <p><strong>Classificação:</strong> {{ $classificacao }}</p>
        </div>
    </div>
</body>
</html>
