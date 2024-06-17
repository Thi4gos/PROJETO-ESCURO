document.getElementById("loginForm").addEventListener("submit", function (event) {
    //event.preventDefault();

    var usuarioInput = document.getElementById("email");
    var usuarioError = document.getElementById("usuarioError");
    var senhaInput = document.getElementById("senha");
    var senhaError = document.getElementById("senhaError");
    var usuarioValue = usuarioInput.value.trim();
    var senhaValue = senhaInput.value.trim();
    var formIsValid = true;

    // Função de validação de campos
    function validateField(input, errorElement, minLength, errorMessage) {
        if (input.value.trim().length < minLength) {
            errorElement.textContent = errorMessage;
            errorElement.style.display = "block";
            input.style.borderColor = "red";
            input.focus();
            return false;
        } else {
            errorElement.textContent = "";
            errorElement.style.display = "none";
            input.style.borderColor = "#ccc";
            return true;
        }
    }

    // Validação do usuário e senha
    formIsValid = validateField(usuarioInput, usuarioError, 7, "O usuário deve conter pelo menos 7 caracteres.") && formIsValid;
    formIsValid = validateField(senhaInput, senhaError, 8, "A senha deve conter pelo menos 8 caracteres.") && formIsValid;

    // Se o formulário for válido, envia a requisição para o backend
    if (formIsValid) {
        var formData = new FormData();
        formData.append('email', usuarioValue);
        formData.append('senha', senhaValue);

        fetch('../../CORE/LogReg.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redireciona se login for bem-sucedido
                window.location.href = data.redirect;
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
            return error;
        });
    }
});
