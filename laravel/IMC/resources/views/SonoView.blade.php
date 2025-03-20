<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qualidade de Sono</title>
</head>
<body>
    <h1>Qualidade de Sono</h1>
    <p>Insira as informações para avaliar a qualidade do seu sono:</p>
    <form action="/SonoResultView" method="post">
        @csrf
        <label for="hora" class="form-label">Média de horas dormidas:</label>
        <input type="number" name="hora" id="hora" class="form-control" required>

        <br><br>

        <label for="idade" class="form-label">Sua Idade:</label>
        <input type="number" name="idade" class="form-control" id="idade" placeholder="Digite quantos anos você tem" required>
        <label for="mes" class="form-label">Se for um recem nascido, digite quantos meses ele tem (e deixe a idade em 0):</label>
        <input type="number" name="mes" class="form-control" id="mes"required>

        <br><br>

        <button type="submit" class="btn btn-primary">Descobrir sua qualidade de sono!</button>
        <hr>
    </form>
</body>
</html>
