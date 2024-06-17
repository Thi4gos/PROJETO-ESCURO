// Validação de nome completo
// Obtém os elementos de entrada e de mensagem de erro para o nome completo
const nomeCompletoInput = document.getElementById('nomeCompleto');
const errorNomeCompletoParagraph = document.getElementById('errorNomeCompleto');

// Adiciona um ouvinte de evento para detectar alterações no campo de nome completo
nomeCompletoInput.addEventListener('input', function () {
    // Verifica se o valor do campo de nome completo não corresponde ao padrão especificado
    if (!this.value.match(/^[a-zA-Z\s]{15,80}$/)) {
        // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
        errorNomeCompletoParagraph.textContent = 'O nome deve conter apenas letras e ter entre 15 e 80 caracteres.';
        this.classList.add('error');
    } else {
        // Limpa a mensagem de erro e remove a classe 'error' do campo de entrada
        errorNomeCompletoParagraph.textContent = '';
        this.classList.remove('error');
    }
});



// Validação de CPF
// Obtém os elementos de entrada e de mensagem de erro para o CPF
const cpfInput = document.getElementById('cpf');
const errorCPFParagraph = document.getElementById('errorCPF');

// Adiciona um ouvinte de evento para detectar alterações no campo de CPF
cpfInput.addEventListener('input', function () {
    // Verifica se o valor do campo de CPF não é válido
    if (!validarCPF(this.value)) {
        // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
        errorCPFParagraph.textContent = 'CPF inválido.';
        this.classList.add('error');
    } else {
        // Limpa a mensagem de erro e remove a classe 'error' do campo de entrada
        errorCPFParagraph.textContent = '';
        this.classList.remove('error');
    }
});

// Validação de CEP e preenchimento de endereço
// Obtém os elementos de entrada para CEP, logradouro, bairro, cidade e estado
const cepInput = document.getElementById('cep');
const logradouroInput = document.getElementById('logradouro');
const bairroInput = document.getElementById('bairro');
const cidadeInput = document.getElementById('cidade');
const estadoInput = document.getElementById('estado');
const errorCEPParagraph = document.getElementById('errorCEP');

// Adiciona um ouvinte de evento para detectar quando o campo de CEP perde o foco
cepInput.addEventListener('blur', function () {
    const cep = cepInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // Verifica se o CEP possui exatamente 8 dígitos
    if (cep.length !== 8) {
        // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
        errorCEPParagraph.textContent = 'CEP inválido.';
        cepInput.classList.add('error');
        return;
    }

    // Faz uma solicitação à API ViaCEP para obter informações do endereço com base no CEP
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            // Verifica se houve um erro ao buscar o CEP
            if (data.erro) {
                // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
                errorCEPParagraph.textContent = 'CEP não encontrado.';
                cepInput.classList.add('error');
                return;
            }

            // Preenche os campos de endereço com os dados retornados pela API
            logradouroInput.value = data.logradouro;
            bairroInput.value = data.bairro;
            cidadeInput.value = data.localidade;
            estadoInput.value = data.uf;
            // Limpa a mensagem de erro e remove a classe 'error' do campo de entrada
            errorCEPParagraph.textContent = '';
            cepInput.classList.remove('error');
        })
        .catch(error => {
            // Trata erros na solicitação à API
            console.error('Erro ao obter dados do CEP:', error);
            errorCEPParagraph.textContent = 'Erro ao obter dados do CEP. Preencha manualmente.';
            cepInput.classList.add('error');
        });
});

// Formatação e validação de telefone
// Obtém os elementos de entrada e de mensagem de erro para telefone celular e fixo
const telefoneCelularInput = document.getElementById('telefoneCelular');
const telefoneFixoInput = document.getElementById('telefoneFixo');
const telefoneCelularError = document.getElementById('telefoneCelularError');
const telefoneFixoError = document.getElementById('telefoneFixoError');

// Adiciona ouvintes de evento para detectar alterações nos campos de telefone celular e fixo
telefoneCelularInput.addEventListener('input', function () {
    const value = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    const formattedValue = formatarTelefone(value); // Formata o valor do telefone
    this.value = formattedValue; // Atualiza o valor do campo de entrada
    validarTelefone(this); // Valida o telefone
});

telefoneFixoInput.addEventListener('input', function () {
    const value = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    const formattedValue = formatarTelefone(value); // Formata o valor do telefone
    this.value = formattedValue; // Atualiza o valor do campo de entrada
    validarTelefone(this); // Valida o telefone
});

// Função para formatar o número de telefone
function formatarTelefone(value) {
    if (value.length === 11) {
        // Formata celular
        return value.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (value.length === 11) {
        // Formata fixo
        return value.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }
    // Retorna o valor não formatado se não corresponder aos tamanhos esperados
    return value;
}


// Função para validar o número de telefone
function validarTelefone(input) {
    const telefoneCelularRegex = /^\(\d{2}\) \d{5}-\d{4}$/; // Regex para celular
    const telefoneFixoRegex = /^\(\d{2}\) \d{4}-\d{4}$/; // Regex para fixo
    const isValid = (input === telefoneCelularInput && telefoneCelularRegex.test(input.value)) ||
                    (input === telefoneFixoInput && telefoneFixoRegex.test(input.value)); // Verifica se o telefone é válido

    if (!isValid) {
        input.classList.add('error'); // Adiciona a classe 'error' se o telefone não for válido
        if (input === telefoneCelularInput) {
            telefoneCelularError.textContent = 'Por favor, insira um número de telefone celular válido.';
        } else {
            telefoneFixoError.textContent = 'Por favor, insira um número de telefone fixo válido.';
        }
    } else {
        input.classList.remove('error'); // Remove a classe 'error' se o telefone for válido
        if (input === telefoneCelularInput) {
            telefoneCelularError.textContent = '';
        } else {
            telefoneFixoError.textContent = '';
        }
    }
}

// Validação de login
// Obtém os elementos de entrada e de mensagem de erro para login
const loginInput = document.getElementById('login');
const errorLoginParagraph = document.getElementById('errorLogin');

// Adiciona um ouvinte de evento para detectar alterações no campo de login
loginInput.addEventListener('input', function () {
    // Verifica se o valor do campo de login não corresponde ao padrão especificado
    if (!/^[a-zA-Z0-9_]{6}$/.test(this.value)) {
        // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
        errorLoginParagraph.textContent = 'O login deve ter exatamente 6 caracteres alfanuméricos.';
        this.classList.add('error');
    } else {
        // Limpa a mensagem de erro e remove a classe 'error' do campo de entrada
        errorLoginParagraph.textContent = '';
        this.classList.remove('error');
    }
});

// Validação de senha e confirmação de senha
// Obtém os elementos de entrada e de mensagem de erro para senha e confirmação de senha
const senhaInput = document.getElementById('senha');
const confirmarSenhaInput = document.getElementById('confirmarSenha');
const errorSenhaParagraph = document.getElementById('errorSenha');
const errorConfirmarSenhaParagraph = document.getElementById('errorConfirmarSenha');

// Adiciona um ouvinte de evento para detectar alterações no campo de senha
senhaInput.addEventListener('input', function () {
    // Verifica se o valor do campo de senha não corresponde ao padrão especificado
    if (!/^[a-zA-Z0-9_]{8}$/.test(this.value)) {
        // Exibe mensagem de erro e adiciona a classe 'error' ao campo de entrada
        errorSenhaParagraph.textContent = 'A senha deve ter exatamente 8 caracteres alfanuméricos.';
        this.classList.add('error');
    } else {
        // Limpa a mensagem de erro e remove a classe 'error' do campo de entrada
        errorSenhaParagraph.textContent = '';
        this.classList.remove('error');
        verificarSenhas(); // Verifica se as senhas coincidem
    }
});

// Adiciona um ouvinte de evento para detectar alterações no campo de confirmação de senha
confirmarSenhaInput.addEventListener('input', function () {
    verificarSenhas(); // Verifica se as senhas coincidem
});

// Função para verificar se as senhas coincidem
function verificarSenhas() {
    if (senhaInput.value !== confirmarSenhaInput.value) {
        errorConfirmarSenhaParagraph.textContent = 'As senhas não coincidem.';
        confirmarSenhaInput.classList.add('error');
    } else {
        errorConfirmarSenhaParagraph.textContent = '';
        confirmarSenhaInput.classList.remove('error');
    }
}

// Validação completa no envio do formulário
document.getElementById("myForm").addEventListener("submit", function (event) {
    let isValid = true;

    // Verifica se todos os campos estão válidos antes de enviar o formulário
    if (!nomeCompletoInput.value.match(/^[a-zA-Z ]{15,80}$/)) {
        errorNomeCompletoParagraph.textContent = 'O nome deve conter apenas letras e ter entre 15 e 80 caracteres.';
        nomeCompletoInput.classList.add('error');
        isValid = false;
    } else {
        errorNomeCompletoParagraph.textContent = '';
        nomeCompletoInput.classList.remove('error');
    }

    if (!validarCPF(cpfInput.value)) {
        errorCPFParagraph.textContent = 'CPF inválido.';
        cpfInput.classList.add('error');
        isValid = false;
    } else {
        errorCPFParagraph.textContent = '';
        cpfInput.classList.remove('error');
    }

    if (cepInput.value.replace(/\D/g, '').length !== 8) {
        errorCEPParagraph.textContent = 'CEP inválido.';
        cepInput.classList.add('error');
        isValid = false;
    } else {
        errorCEPParagraph.textContent = '';
        cepInput.classList.remove('error');
    }

    validarTelefone(telefoneCelularInput);
    validarTelefone(telefoneFixoInput);

    if (!/^[a-zA-Z0-9_]{6}$/.test(loginInput.value)) {
        errorLoginParagraph.textContent = 'O login deve ter exatamente 6 caracteres alfanuméricos.';
        loginInput.classList.add('error');
        isValid = false;
    } else {
        errorLoginParagraph.textContent = '';
        loginInput.classList.remove('error');
    }

    if (!/^[a-zA-Z0-9_]{8}$/.test(senhaInput.value)) {
        errorSenhaParagraph.textContent = 'A senha deve ter exatamente 8 caracteres alfanuméricos.';
        senhaInput.classList.add('error');
        isValid = false;
    } else {
        errorSenhaParagraph.textContent = '';
        senhaInput.classList.remove('error');
    }

    if (senhaInput.value !== confirmarSenhaInput.value) {
        errorConfirmarSenhaParagraph.textContent = 'As senhas não coincidem.';
        confirmarSenhaInput.classList.add('error');
        isValid = false;
    } else {
        errorConfirmarSenhaParagraph.textContent = '';
        confirmarSenhaInput.classList.remove('error');
    }

    // Se algum campo não for válido, impede o envio do formulário
    if (!isValid) {
        event.preventDefault();
    }
});

// Função para validar CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos
    if (cpf == '') return false;

    // Elimina CPFs inválidos conhecidos
    if (cpf.length != 11 ||
        cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" ||
        cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
        cpf == "88888888888" || cpf == "99999999999")
        return false;

    // Valida 1o dígito
    let add = 0;
    for (let i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    let rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;

    // Valida 2o dígito
    add = 0;
    for (let i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;

    return true;
}

// validacao.js
document.addEventListener('DOMContentLoaded', function () {
    const errorEmailParagraph = document.getElementById('error-email');
    const email = new URLSearchParams(window.location.search).get('error-email');

    if (email) {
        errorEmailParagraph.textContent = 'O email já está cadastrado.';
        errorEmailParagraph.classList.add('error');
    }
});

// JavaScript para alternar a visibilidade da senha
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const senhaInput = document.getElementById('senha');

    togglePassword.addEventListener('click', function () {
        // Alterna entre text e password
        const type = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
        senhaInput.setAttribute('type', type);

        // Alterna entre ícone de olho aberto e fechado
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
});