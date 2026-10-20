<?php

// lista_livro.php
// Exibe todos os livros cadastrados em uma tabela
// Conceitos: SELECT, MySQL, (READ DO CRUD), loop do while

// Inclui a conexão com o banco de dados
include("conexao.php");

// Consulta SQL para selecionar todos os livros da tabela "livros"
$sql = "SELECT * FROM livros";

// Executa a consulta SQL e armazena o resultado
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Container mais largo para acomodar a página -->
    <div class="container container-largo">
        <h1>Lista de Livros</h1>
        <p class="subtitulo">
            Todos os livros cadastrados na biblioteca
        </p>

        <!-- Tabela estimizada com os dados dos livros -->
        <table class="tabela-livros">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <?php
            //Loop while percorrecada livro retornada
            //Pela consulta SQL.
            while ($livro = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['status']; ?></td>
                    <td class="acoes">
                        <!-- Link para editar o livro -->
                        <!-- Envia o ID pela URL com ?id= -->
                        <a href="editar_livro.php?id=<?php echo $livro['id']; ?>" class=link-editar">
                            Editar
                        </a>
                        <!-- Link para excluir o livro com o JS-->
                        <a href="excluir_livro.php?id=<?php echo $livro['id']; ?>
                         " class="link-excluir" onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!-- Botão de voltar para o painel principal -->
        <a href="painel.php" class="btn btn-voltar">
            Voltar para o Painel.
        </a>
    </div>

</body>

</html>