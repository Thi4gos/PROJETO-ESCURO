<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Formadora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #b6b6b6;
        }
        nav {
            background-color: #0c0c0c;
            color: #fff;
            padding: 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 999;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 10px 10px 10px 55px;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.8s ease;
        }

        nav ul li a:hover {
            color: #ff0000;
        }

        form {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 30px;
            border: 2px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            width: 49%;
            background-color: #000;
            /* Altera o fundo para preto */
            color: #fff;
            /* Cor do texto branco */
            border: 1px solid #000;
            /* Adiciona borda preta */
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #fff;
            /* Cor de fundo branca ao passar o mouse */
            color: #000;
            /* Cor do texto preto */
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .menu {
            margin: 10px auto;
        }

        .container {
            max-width: 600px;
            /* Define a largura máxima do contêiner */
            margin: 50px auto;
            /* Centraliza o contêiner */
            background-color: #fff;
            /* Cor de fundo do contêiner */
            padding: 20px;
            /* Espaçamento interno do contêiner */
            border-radius: 20px;
            box-shadow: 20px 20px 10px rgba(0, 0, 0, 0.212);
        }

        /* Media queries for responsiveness */
        @media only screen and (max-width: 768px) {
            .container {
                width: 90%;
                margin: 50px auto;
            }

            input[type="submit"],
            input[type="button"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Avaliação Formadora</h1>
    </header>

    <nav class="menu">
        <ul>
            <li><a href="index.php">Tela principal</a></li>
            <li><a href="1.php">Exercicio 1</a></li>
            <li><a href="2.php">Exercicio 2</a></li>
            <li><a href="3.php">Exercicio 3</a></li>
        </ul>
    </nav>

    <div class="container">
        <form id="loginForm" action="" method="post">
            <label for="usuario">Login:</label>
            <input type="text" id="usuario" name="usuario" required><br> <!-- Corrigido o ID aqui -->
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>
            <input type="submit" value="Cadastrar">
        </form>
        <?php
        include "config.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $sql  = "INSERT INTO `usuarios` (`usuario`, `senha`) VALUES ('$usuario','$senha')";

            if (mysqli_query($conn, $sql)) {
                echo " cadastrado com sucesso!";
            } else {
                echo " NÃO foi cadastrado";
            }
        }
        ?>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var usuarioInput = document.getElementById("usuario"); // Corrigido o ID aqui
            var senhaInput = document.getElementById("senha");
            var usuarioValue = usuarioInput.value.trim();
            var senhaValue = senhaInput.value.trim();

            if (usuarioValue.length < 5) {
                alert("O usuário deve conter pelo menos 5 caracteres.");
                event.preventDefault();
            }

            if (senhaValue.length < 6) {
                alert("A senha deve conter pelo menos 6 caracteres.");
                event.preventDefault();
            }
        });
    </script>

</body>

</html>
