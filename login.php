<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Biblioteca</h1>
        <p class="subtitulo">Faça o seu login para acessar o sistema.</p>
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] === 'login') {
            echo '<div class="mensagem-erro">Erro: Email ou senha incorretos. Por favor, tente novamente.</div>';
        }
        ?>

        <form action="autenticar.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-block">Entrar</button>
        </form>

        <div class="mensagem-cadastro">
            <p>Não possui uma conta? <a href="cadastrar.php">Cadastre-se aqui</a>.</p>
        </div>
        <div class="dica-navegacao">
            <strong>Fluxo: </strong> Login → Painel → Gerenciar Livros
        </div>
    </div>

</body>

</html>
