<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>
@extends('layouts.app')
<h1>Validação de IMC</h1>

<p>Para saber seu IMC precisamos de algumas informações:</p>

<form action="/ImcResultView" method="post">
    @csrf
    <label for="peso" class="form-label">Peso:</label>
    <input type="number" name="peso" id="peso" class="form-control" step="0.01" required>

    <br><br>

    <label for="altura" class="form-label">Altura:</label>
    <input type="number" name="altura" class="form-control" id="altura" step="0.01" required>

    <br><br>

    <button type="submit" class="btn btn-primary">Descobrir IMC!</button>
    <hr>
</form>

</body>
</html>
