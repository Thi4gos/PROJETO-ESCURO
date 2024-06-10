document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var usuarioInput = document.getElementById("email");
    var usuarioError = document.getElementById("usuarioError");
    var senhaInput = document.getElementById("senha");
    var senhaError = document.getElementById("senhaError");
    var usuarioValue = usuarioInput.value.trim();
    var senhaValue = senhaInput.value.trim();
    var formIsValid = true;

    // Validação do usuário
    if (usuarioValue.length < 7) {
        usuarioError.textContent = "O usuário deve conter pelo menos 7 caracteres.";
        usuarioError.style.display = "block";
        usuarioInput.style.borderColor = "red";
        usuarioInput.focus();
        formIsValid = false;
    } else {
        usuarioError.textContent = "";
        usuarioError.style.display = "none";
        usuarioInput.style.borderColor = "#ccc";
    }

    // Validação da senha
    if (senhaValue.length < 8) {
        senhaError.textContent = "A senha deve conter pelo menos 8 caracteres.";
        senhaError.style.display = "block";
        senhaInput.style.borderColor = "red";
        senhaInput.focus();
        formIsValid = false;
    } else {
        senhaError.textContent = "";
        senhaError.style.display = "none";
        senhaInput.style.borderColor = "#ccc";
    }

    // Se o formulário for válido, envia a requisição para o backend
    if (formIsValid) {
        var formData = new FormData();
        formData.append('email', usuarioValue);
        formData.append('senha', senhaValue);

        fetch('../../CORE/log.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Comentando a linha de redirecionamento
                // window.location.href = '../../index.php';
            } else {
                // Exibe a mensagem de erro retornada pelo backend
                if (data.message.includes("senha")) {
                    senhaError.textContent = data.message;
                    senhaError.style.display = "block";
                    senhaInput.style.borderColor = "red";
                } else {
                    usuarioError.textContent = data.message;
                    usuarioError.style.display = "block";
                    usuarioInput.style.borderColor = "red";
                }
            }
        })
        .catch(error => {
            console.error('Erro ao tentar fazer login:', error);
        });
    }
});
