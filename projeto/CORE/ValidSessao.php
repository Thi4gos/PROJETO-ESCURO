<?php 
session_start();

// Verificar se o email e a senha estão definidos na sessão
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    // Se não estiverem, desfazer as variáveis de sessão e redirecionar para a página de login
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: view/login/login.php');
    exit;
}