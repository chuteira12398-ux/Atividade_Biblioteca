<?php

 // Inclui a verificação de sessão (protege a página de acesso não autorizado)
include("verifica_sessao.php");


?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Exibe o nome do usuário logado (vem de sessão $_SESSION)-->
         <h1>Olá, <?php echo $_SESSION['nome']; ?></h1>
        <p class="subtitulo">Bem-vindo ao painel principal da 
            biblioteca. Escolha uma opção abaixo:</p>
            <!-- Cards grandes para facilitar a navegação -->
             <div class="painel-cards">
                <a href="cadastro_livros.php" class="card-link">
                    Cadastrar Livro
                </a>
                <a href="listar_livros.php" class="card-link">
                    Listar Livros
                </a>
                <a href="logout.php" class="card-link">
                    Sair
                </a>
            </div>    
            <div class="dica-navegacao">
                <strong> Fluxo</strong> 
                Painel → Cadastrar Livro ou Listar Livros → Editar / Excluir          
             </div>
       </body>

    </html>
