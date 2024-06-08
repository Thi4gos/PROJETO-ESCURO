<?php
require_once "config.php";

$response = ['success' => false, 'message' => ''];

// Verifica se os dados foram enviados
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Executa a lógica de login
    global $conn;
    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($usuario_id, $hash_senha);
        $stmt->fetch();

        if (password_verify($senha, $hash_senha)) {
            // Login bem-sucedido
            $response['success'] = true;
            $response['message'] = 'Login bem-sucedido.';
        } else {
            // Senha incorreta
            $response['message'] = 'Senha incorreta.';
        }
    } else {
        // Usuário não encontrado
        $response['message'] = 'Usuário não encontrado.';
    }

    $stmt->close();
} else {
    $response['message'] = 'Dados incompletos.';
}

echo json_encode($response);
?>
