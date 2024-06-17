<?php
// Configurações do banco de dados
require_once "config.php";

// Recebendo dados do formulário
$nomeCompleto = $_POST['nomeCompleto'];
$nomeMaterno = $_POST['nomeMaterno'];
$cpf = $_POST['cpf'];
$telefoneCelular = $_POST['telefoneCelular'];
$telefoneFixo = $_POST['telefoneFixo'];
$dataNascimento = $_POST['dataNascimento'];
$email = $_POST['email'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$sexo = $_POST['sexo'];
$senha = $_POST['senha']; // Agora estamos salvando a senha sem criptografia

// Verificar se o email já existe
$sql_check_email = "SELECT email FROM usuarios WHERE email = ?";
$stmt_check_email = $conn->prepare($sql_check_email);

if ($stmt_check_email) {
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        // Redirecionar para a página de cadastro com parâmetro de erro
        header("Location: ../view/cadastro/cadastro.php?error-email=true");
        exit();
    }

    $stmt_check_email->close();
} else {
    echo "Erro na preparação da consulta de verificação de email: " . $conn->error;
    exit();
}

// Preparando a consulta SQL para inserção
$sql = "INSERT INTO usuarios (nome_completo, nome_materno, cpf, telefone_celular, telefone_fixo, data_nascimento, email, bairro, cep, logradouro, estado, cidade, numero, complemento, sexo, senha)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vinculando os parâmetros
    $stmt->bind_param("ssssssssssssssss", $nomeCompleto, $nomeMaterno, $cpf, $telefoneCelular, $telefoneFixo, $dataNascimento, $email, $bairro, $cep, $logradouro, $estado, $cidade, $numero, $complemento, $sexo, $senha);

    // Executando a consulta
    if ($stmt->execute()) {
        header('Location: ../view/login/login.php');
    } else {
        header('Location: erro.php');
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
