<?php
// Iniciar a sessão
session_start();

require_once "config.php";
require_once "Log.php";
// Recebendo dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparando a consulta SQL
$sql = "SELECT id, senha, nome_completo, tipo_acesso FROM usuarios WHERE email = ?";
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
        $stmt->bind_result($usuario_id, $senha_banco, $nome_completo, $tipo_acesso);
        $stmt->fetch();

        // Verificando a senha
        if ($senha === $senha_banco) { // Comparando a senha digitada com a senha do banco (sem criptografia)
            // Senha correta, iniciar a sessão
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha_banco; // Armazene a senha no formato em que está no banco
            $_SESSION['nome'] = $nome_completo; // Armazene o nome completo na sessão
            $_SESSION['tipo_acesso'] = $tipo_acesso; // Armazene o tipo de acesso na sessão

            // Registrar log de login bem-sucedido
            registrarLog($conn, $usuario_id, 'login', 'Login bem-sucedido.');

            // Redirecionar para a página principal
            header('location: ../index.php');
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
            // Registrar tentativa de login com senha incorreta
            registrarLog($conn, $usuario_id, 'login_falha', 'Tentativa de login com senha incorreta.');
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
