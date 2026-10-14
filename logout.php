<?php

 // logout.php
 // Encerra a sessão do usuário de forma segura
 // Conceitos: session_destroy, limpezade cookies, header anti-cache

 // Inicia a sessão para poder destruí-la
 session_start();

 // Limpa todas as variáveis de sessão
 $_SESSION = array();

 // Remove o cookie de sessão do navegador
 if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(), 
        '', 
        time() - 42000,
            $params["path"], 
            $params["domain"],
            $params["secure"], 
            $params["httponly"] 
        );
 }

  // Destrói cmpletamente a sessão
  session_destroy();

   // Cabeçalho que impede o cache da página
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Pragma: no-cache");
   header("Expires: 0");
// Redireciona para a página de login após o logout
   header("Location: login.php");
   exit();