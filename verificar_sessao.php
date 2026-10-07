<?php

 // verificar_sessao.php
 // Arquivo incluido nas páginas restritas no sistema.
 // Garanta que apenas usuários logados possam acessar as páginas do sistema.

 // Inicia a sessão ao usuário (ou retoma a sessão existente)
session_start();

// Cabeçalho HTTP  que impedem o navegador de guardar a página
// em cache
// Isso evita que o usuário volte após o logout

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verifica se a variável de sessão 'nome' está definida
// Se não estiver definida, redireciona para a página de login
if (!isset($_SESSION['nome'])) {
    // header() redireciona o navegador do usuário para outra página
     header("Location: login.php");
     // exit() encerra o scriptpara garantir que nada mais
     // seja executado.
    exit();
}