<?php
session_start(); // Inicia a sessão para obter dados do usuário logado

// Função para verificar a senha atual e alterar para a nova senha
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $userId = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

    // Verifica se a nova senha e a confirmação da senha coincidem
    if ($newPassword !== $confirmPassword) {
        echo "A nova senha e a confirmação da senha não coincidem.";
        exit();
    }

    // Consulta para obter a senha atual do banco de dados
    $sql = "SELECT senha FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // Verifica se a senha atual está correta
    if (password_verify($currentPassword, $hashedPassword)) {
        // Atualiza a senha no banco de dados
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newHashedPassword, $userId);

        if ($stmt->execute()) {
            echo "Senha alterada com sucesso!";
        } else {
            echo "Erro ao alterar a senha: " . $stmt->error;
        }
    } else {
        echo "A senha atual está incorreta.";
    }

    $stmt->close();
}

$conn->close();
?>
