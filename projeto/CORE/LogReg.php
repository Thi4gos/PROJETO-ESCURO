<?php
// Iniciar a sessão
session_start();

require_once "config.php";
require_once "Log.php";

// Recebendo dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparando a consulta SQL
$sql = "SELECT id, senha, nomeCompleto FROM usuarios WHERE email = $email";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vinculando os parâmetros
    $stmt->bind_param("s", $email);

    // Executando a consulta
    $stmt->execute();

    // Armazenando o resultado
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Vinculando o resultado às variáveis
        $stmt->bind_result($id, $hashed_password, $nome_completo);
        $stmt->fetch();

        // Verificando a senha
        if (password_verify($senha, $hashed_password)) {
            // Senha correta, iniciar a sessão
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $hashed_password; // Armazene a senha criptografada na sessão para verificação posterior
            $_SESSION['nome'] = $nome_completo; // Armazene o nome completo na sessão

            header("Location: ../../index.php");  // Redirecionar para a página principal
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
