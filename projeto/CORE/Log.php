<?php
function registrarLog($conn, $usuarioId, $acao, $detalhes = null) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO log (usuario_id, acao, ip, detalhes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("isss", $usuarioId, $acao, $ip, $detalhes);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Erro ao preparar a consulta de log: " . $conn->error);
    }
}
