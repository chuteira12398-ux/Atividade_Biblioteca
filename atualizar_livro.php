<?php

 // atualizar_livro.php
 // Recebe os dados do formulário de edição e atualiza o livro
 // Conceitos: POST, MySQL, UPDATE (DO CRUD)

 // Protege a página: só usuários logados podem atualizar o livro
 include("verificar_sessao.php");
 
 // Inclui conexao com o banco de dados
 include("conexao.php");

 // Recebe os dados enviados pelo formulário de edição.
 $id = $_POST['id'];
 $titulo = $_POST['titulo'];
 $autor = $_POST['autor'];
 $status = $_POST['status'];

 // Monta o comando SQL UPDATE para alterar os dados do livro
 $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', 
 status = '$status' WHERE id = $id";

 // Executa o UPDATE no banco de dados
 mysqli_query($conexao, $sql);

 // Redireciona para a listagem após atualizar
 header("Location: lista_livro.php");
 exit();