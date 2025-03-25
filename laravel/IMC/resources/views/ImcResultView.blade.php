<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
</head>
<body>
    @extends('layouts.app')
    <div class="container mt-5">
        <h2 class="text-center">Resultado do IMC</h2>

        <div class="alert alert-info">
            <p>Seu IMC é <strong>{{ $imc }}</strong></p>
            <p>Classificação: <strong>{{ $categoria }}</strong></p>
        </div>
        <a href="/" class="btn btn-primary">Voltar à Página Inicial</a>
    </div>
</body>
</html>
