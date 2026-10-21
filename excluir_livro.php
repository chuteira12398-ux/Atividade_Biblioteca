<?php

 // excluir_livro.php
 // Remove um livro do banco de dados com base no ID.
 // Conceitos: $_GET, DELETE DO CRUD, MySQL

 // Protege a página para que apenas usuários logados possam acessar
 include("verificar_sessao.php");

 // Inclui a conexão com o banco de dados
 include("conexao.php");

 // Recebe o ID do livro pela URL (ex: excluir_livro.php?=3)
 $id = $_GET['id'];

 // Monta o comando SQL DELETE para remover o livro
 $sql = "DELETE FROM livros WHERE id = $id";

 // Executa  o DELETE no banco de dados
 mysqli_query($conexao, $sql);

 // Redireciona para a listagem de livros após a exclusão
 header("Location: lista_livro.php");
 exit();