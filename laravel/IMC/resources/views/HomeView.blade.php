<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela Inicial</title>
</head>
<body>
    @extends('layouts.app')
    <div class="home-container">
        <h1 class="home-title">Tela Inicial</h1>
        <div class="home-links">
            <a href="/ImcView" class="home-link">Calculadora de IMC</a>
            <a href="/SonoView" class="home-link">Qualidade de Sono</a>
            <a href="/GastoView" class="home-link">Calculadora de Gasto em Viagem</a>
        </div>
    </div>
</body>
</html>
