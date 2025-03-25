<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualidade de Sono</title>
</head>
<body>
    @extends('layouts.app')
    <div class="container mt-5">
        <h2 class="text-center">Resultado da qualidade de seu sono:</h2>

        <div class="resultado">
            <p><strong>Idade:</strong> {{ $idade }} anos</p>
            <p><strong>Meses:</strong> {{ $mes ?? 'N/A' }}</p>
            <p><strong>Horas Dormidas:</strong> {{ $hora }} horas</p>
            <p><strong>Classificação:</strong> {{ $classificacao }}</p>
        </div>
        <a href="/" class="btn btn-primary">Voltar à Página Inicial</a>
    </div>
</body>
</html>
