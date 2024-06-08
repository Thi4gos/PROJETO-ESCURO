<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Escuro Internet - Login</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form id="loginForm" action="../../CORE/log.php" method="post">
            <a href="../../index.html"><img src="../../assets/img/" class="logo"></a>
            <h1>Login</h1>
            <label for="usuario">Usuário:</label>
            <input type="text" id="email" name="email" placeholder="Digite seu email..." required>
            <span id="usuarioError" class="error"></span>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua Senha..." required>
            <span id="senhaError" class="error"></span>
            <input type="submit" value="Enviar">
            <input type="button" value="Voltar" onclick="window.location.href='index.php'">
            Não consegue acessar sua conta? <a href="../alterPassView.php">Clique aqui</a>
            Não cadastrado? <a href="../cadastro/cadastro.php">click aqui</a>
        </form>
    </div>
<script src="script.js"></script>
</body>
</html>