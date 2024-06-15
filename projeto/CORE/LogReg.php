<?php
// Iniciar a sessão
session_start();

require_once "config.php";
require_once "Log.php";
// Recebendo dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparando a consulta SQL
$sql = "SELECT senha, nomeCompleto, tipo_acesso FROM usuarios WHERE email = ?";
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
        $stmt->bind_result($hashed_password, $nome_completo, $tipo_acesso);
        $stmt->fetch();

        // Verificando a senha
        if (password_verify($senha, $hashed_password)) {
            // Senha correta, iniciar a sessão
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $hashed_password; // Armazene a senha criptografada na sessão para verificação posterior
            $_SESSION['nome'] = $nome_completo; // Armazene o nome completo na sessão
            $_SESSION['tipo_acesso'] = $tipo_acesso; // Armazene o tipo de acesso na sessão

            // Redirecionar para a página principal
            echo json_encode(['success' => true, 'redirect' => '../../index.php']);
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Erro na preparação da consulta: ' . $conn->error]);
}
// Fechar a conexão
$conn->close();
?>
