<?php
// salvar_usuario.php 
// Recebe os dados do formulário de cadastro e salva o usuário
// o banco de dados
// Conceitos: POST, password_hash, MySQL, INSERT, verificação
// de E-mail duplicado.

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Recebe os dados do formulário de cadastro
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//==========================================================
// VERIFICAÇÃO DE E-MAIL DUPLICADO
// Antes de verificar se o e-mail já existe no banco
//==========================================================

// Monta a consulta SQL (SELECT) para verificar se o e-mail já existe
$sqlVerificar = "SELECT id FROM usuarios WHERE email = '$email'";

// Executa a consulta do SQL
$resultadoVerificar = mysqli_query($conexao, $sqlVerificar);

// Validação: mysqli_num_rows() conta quantos registros
// foram registrados.
if (mysqli_num_rows($resultadoVerificar) > 0) {
    // E-mail já existe, redireciona de volta para o formulário de cadastro
    // com mensagem de erro
    header("Location: cadastro.php?erro=email");
    exit();
}

//==========================================================
// Criptografia da senha
// Nunca armazene a senha em texto puro no banco de dados!
//==========================================================
// passwod_hash gera um hash  seguro da senha
// PASSWORD_DEFAULT usa uma lgoritmo bcypt (padrão do PHP)

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// ==========================================================
// INSERÇÃO NO BANCO (CREATE do CRUD)
//==========================================================

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES 
('$nome', '$email', '$senhaCriptografada')";   

// Executa o INSERT no banco de dados
mysqli_query($conexao, $sql);

// Redireciona o usuário para a página de login com mensagem de sucesso
// bem-sucedido.
header("Location: login.php");
exit();

