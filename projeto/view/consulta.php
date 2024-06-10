<?php
require_once "../CORE/config.php";

// Variável para armazenar os resultados
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    // Prevenir SQL Injection
    $nome = $conn->real_escape_string($nome);

    // Consulta ao banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar resultados
        $resultado = "<table><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th></tr>";
        while($row = $result->fetch_assoc()) {
            $resultado .= "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["email"]. "</td><td>" . $row["telefone"]. "</td></tr>";
        }
        $resultado .= "</table>";
    } else {
        $resultado = "Nenhum registro encontrado.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Usuários</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Consulta de Usuários</h1>
    <form action="consulta.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Pesquisar</button>
    </form>
    <div>
        <?php
        // Incluir o resultado da consulta PHP
        if (isset($resultado)) {
            echo $resultado;
        }
        ?>
    </div>
</body>
</html>
