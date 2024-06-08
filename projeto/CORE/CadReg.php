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
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Criptografando a senha

// Preparando a consulta SQL
$sql = "INSERT INTO usuarios (nome_completo, nome_materno, cpf, telefone_celular, telefone_fixo, data_nascimento, email, bairro, cep, logradouro, estado, cidade, numero, complemento, sexo, senha)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vinculando os parâmetros
    $stmt->bind_param("ssssssssssssssss", $nomeCompleto, $nomeMaterno, $cpf, $telefoneCelular, $telefoneFixo, $dataNascimento, $email, $bairro, $cep, $logradouro, $estado, $cidade, $numero, $complemento, $sexo, $senha);

    // Executando a consulta
    if ($stmt->execute()) {
        // echo "Registro inserido com sucesso!";
        header('Location: ../view/login/login.php');
    } else {
        // echo "Erro ao inserir registro: " . $stmt->error;
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
