<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qualidade de Sono</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Qualidade de Sono</h1>
        <p>Insira as informações para avaliar a qualidade do seu sono:</p>

        <form action="/ResultSonoView" method="post">
            @csrf

            <label for="hora" class="form-label">Média de horas dormidas:</label>
            <input type="number" name="hora" id="hora" class="form-control" step="0.1" required>

            <br>

            <label for="idade" class="form-label">Sua Idade:</label>
            <input type="number" name="idade" class="form-control" id="idade" placeholder="Digite quantos anos você tem" required>

            <br>

            <label for="mes" class="form-label">Se for um recém-nascido, digite quantos meses ele tem (caso contrário, deixe 0):</label>
            <input type="number" name="mes" class="form-control" id="mes" required>

            <br>

            <button type="submit" class="btn btn-primary">Descobrir sua qualidade de sono!</button>
        </form>
    </div>
</body>
</html>
