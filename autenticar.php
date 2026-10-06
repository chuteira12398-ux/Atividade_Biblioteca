<?php
// autenticar.php verificar se o e-mail e senha estão corretos!
// Conceito deles são: session_start, SELECT no MySQL, password_verify!

// Aqui inicia a sessão do usuário.
// A Sessão permite guardar os dados do usuario logado entre as páginas!

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Recebe o email e a senha digitando no formulário de login.
$email = $_POST['email'];
$senha = $_POST['senha'];

//==========================================================
// CONSULTA NO BANCO (READ do CRUD)
// Busca o usúario pelo email informado.
//==========================================================    

// Montando a consulta do SQL SELECT
$sql = "SELECT * FROM usuarios WHERE email = '$email'";

// Executa a consulta e guarda o resultado.
$resultado = mysqli_query($conexao, $sql);

// mysqli_fetch_assoc() transforma a linha do resultado
// em array associativo
$usuario = mysqli_fetch_assoc($resultado);

//==========================================================
// VERIFICAÇÃO DA SENHA
//========================================================== 

// Verificação se o usuário existe e se a senha está correta.
// password_verify() compara a senha digitada com a senha digitada com o hash salvo
// no banco
if ($usuario && password_verify($senha, $usuario['senha'])) {
    // Login bem-sucedido, guarda o nome do usúario na sessão.
    $_SESSION['nome'] = $usuario['nome'];
    // Redireciona para o painel principal
    header("Location: dashboard.php");
    exit();
} else {
    // Login inválido, redireciona de volta para a página de login
    // com mensagem
    header("Location: login.php?erro=login");
    exit();
}
