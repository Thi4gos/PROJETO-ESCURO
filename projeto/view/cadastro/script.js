 // Validação de nome completo
 const nomeCompletoInput = document.getElementById('nomeCompleto');
 const errorNomeCompletoParagraph = document.getElementById('errorNomeCompleto');

 nomeCompletoInput.addEventListener('input', function () {
     if (!this.value.match(/^[a-zA-Z ]{15,80}$/)) {
         errorNomeCompletoParagraph.textContent = 'O nome deve conter apenas letras e ter entre 15 e 80 caracteres.';
         this.classList.add('error');
     } else {
         errorNomeCompletoParagraph.textContent = '';
         this.classList.remove('error');
     }
 });

 // Validação de CPF
 const cpfInput = document.getElementById('cpf');
 const errorCPFParagraph = document.getElementById('errorCPF');

 cpfInput.addEventListener('input', function () {
     if (!validarCPF(this.value)) {
         errorCPFParagraph.textContent = 'CPF inválido.';
         this.classList.add('error');
     } else {
         errorCPFParagraph.textContent = '';
         this.classList.remove('error');
     }
 });

 // Validação de CEP e preenchimento de endereço
 const cepInput = document.getElementById('cep');
 const logradouroInput = document.getElementById('logradouro');
 const bairroInput = document.getElementById('bairro');
 const cidadeInput = document.getElementById('cidade');
 const estadoInput = document.getElementById('estado');
 const errorCEPParagraph = document.getElementById('errorCEP');

 cepInput.addEventListener('blur', function () {
     const cep = cepInput.value.replace(/\D/g, '');

     if (cep.length !== 8) {
         errorCEPParagraph.textContent = 'CEP inválido.';
         cepInput.classList.add('error');
         return;
     }

     fetch(`https://viacep.com.br/ws/${cep}/json/`)
         .then(response => response.json())
         .then(data => {
             if (data.erro) {
                 errorCEPParagraph.textContent = 'CEP não encontrado.';
                 cepInput.classList.add('error');
                 return;
             }

             logradouroInput.value = data.logradouro;
             bairroInput.value = data.bairro;
             cidadeInput.value = data.localidade;
             estadoInput.value = data.uf;
             errorCEPParagraph.textContent = '';
             cepInput.classList.remove('error');
         })
         .catch(error => {
             console.error('Erro ao obter dados do CEP:', error);
             errorCEPParagraph.textContent = 'Erro ao obter dados do CEP. Preencha manualmente.';
             cepInput.classList.add('error');
         });
 });

 // Formatação e validação de telefone
 const telefoneCelularInput = document.getElementById('telefoneCelular');
 const telefoneFixoInput = document.getElementById('telefoneFixo');
 const telefoneCelularError = document.getElementById('telefoneCelularError');
 const telefoneFixoError = document.getElementById('telefoneFixoError');

 telefoneCelularInput.addEventListener('input', function () {
     const value = this.value.replace(/\D/g, '');
     const formattedValue = formatarTelefone(value);
     this.value = formattedValue;
     validarTelefone(this);
 });

 telefoneFixoInput.addEventListener('input', function () {
     const value = this.value.replace(/\D/g, '');
     const formattedValue = formatarTelefone(value);
     this.value = formattedValue;
     validarTelefone(this);
 });

 function formatarTelefone(value) {
     if (value.length === 11) {
         return value.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
     } else if (value.length === 10) {
         return value.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
     }
     return value;
 }

 function validarTelefone(input) {
     const telefoneCelularRegex = /^\(\d{2}\) \d{5}-\d{4}$/;
     const telefoneFixoRegex = /^\(\d{2}\) \d{4}-\d{4}$/;
     const isValid = (input === telefoneCelularInput && telefoneCelularRegex.test(input.value)) ||
                     (input === telefoneFixoInput && telefoneFixoRegex.test(input.value));

     if (!isValid) {
         input.classList.add('error');
         if (input === telefoneCelularInput) {
             telefoneCelularError.textContent = 'Por favor, insira um número de telefone celular válido.';
         } else {
             telefoneFixoError.textContent = 'Por favor, insira um número de telefone fixo válido.';
         }
     } else {
         input.classList.remove('error');
         if (input === telefoneCelularInput) {
             telefoneCelularError.textContent = '';
         } else {
             telefoneFixoError.textContent = '';
         }
     }
 }

 // Validação de login
 const loginInput = document.getElementById('login');
 const errorLoginParagraph = document.getElementById('errorLogin');

 loginInput.addEventListener('input', function () {
     if (!/^[a-zA-Z0-9_]{6}$/.test(this.value)) {
         errorLoginParagraph.textContent = 'O login deve ter exatamente 6 caracteres alfanuméricos.';
         this.classList.add('error');
     } else {
         errorLoginParagraph.textContent = '';
         this.classList.remove('error');
     }
 });

 // Validação de senha e confirmação de senha
 const senhaInput = document.getElementById('senha');
 const confirmarSenhaInput = document.getElementById('confirmarSenha');
 const errorSenhaParagraph = document.getElementById('errorSenha');
 const errorConfirmarSenhaParagraph = document.getElementById('errorConfirmarSenha');

 senhaInput.addEventListener('input', function () {
     if (!/^[a-zA-Z0-9_]{8}$/.test(this.value)) {
         errorSenhaParagraph.textContent = 'A senha deve ter exatamente 8 caracteres alfanuméricos.';
         this.classList.add('error');
     } else {
         errorSenhaParagraph.textContent = '';
         this.classList.remove('error');
         verificarSenhas();
     }
 });

 confirmarSenhaInput.addEventListener('input', function () {
     verificarSenhas();
 });

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

     // Verifica se todos os campos estão válidos
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

     if (!isValid) {
         event.preventDefault();
     }
 });

 // Função para validar CPF
 function validarCPF(cpf) {
     cpf = cpf.replace(/[^\d]+/g, '');
     if (cpf == '') return false;

     // Elimina CPFs inválidos conhecidos
     if (cpf.length != 11 ||
         cpf == "00000000000" ||
         cpf == "11111111111" ||
         cpf == "22222222222" ||
         cpf == "33333333333" ||
         cpf == "44444444444" ||
         cpf == "55555555555" ||
         cpf == "66666666666" ||
         cpf == "77777777777" ||
         cpf == "88888888888" ||
         cpf == "99999999999")
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