<?php 
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');
    $email = $_POST['email'];       
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // Corrigido erro de sintaxe no SQL
    $result = $conn->query($sql);

    if ($result->num_rows < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: ../view/login/login.php');
    } else {
        $user = $result->fetch_assoc();
        $_SESSION['email'] = $user['email'];
        $_SESSION['nome'] = $user['nome']; 
        $_SESSION['senha'] = $user['senha'];
        header('location: ../../index.php');
    }
}
?>
