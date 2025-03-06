<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1 - Revisão PHP - Métodos HTTP</title>
    <style>
        .formulario {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label, input, textarea, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="formulario">
        <h1>Exercício 1 - Revisão PHP - Métodos HTTP</h1>
        <form action="destino.php" method="get">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="(12)3456 7890" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Informe seu email" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="4" placeholder="Escreva aqui sua mensagem" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>