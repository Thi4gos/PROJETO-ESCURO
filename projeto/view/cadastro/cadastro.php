<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escuro Internet - Cadastro</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <a href="../index.html"><img src="../logo.png" class="logo"></a>
    <h1>Cadastro</h1>
    <form action="../../CORE/CadReg.php" method="post" id="cadastroForm">
      <div class="row">
        <div class="column">
          <div class="form-group">
            <label for="nomeCompleto">Nome completo:</label>
            <input type="text" id="nomeCompleto" name="nomeCompleto" pattern="[a-zA-Z]{15,80}"
              title="O nome deve conter apenas letras e ter entre 15 e 80 caracteres." placeholder="Digite seu nome..."
              required>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="nomeMaterno">Nome Materno:</label>
            <input type="text" id="nomeMaterno" name="nomeMaterno" placeholder="Digite o nome da sua mãe..." required>
          </div>
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="telefoneCelular">Telefone Celular:</label>
            <input type="text" id="telefoneCelular" name="telefoneCelular" maxlength="14"
              placeholder="Ex: (XX) XXXXX-XXXX">
            <div class="error-message" id="telefoneCelularError"></div>
          </div>
          <div class="form-group">
            <label for="telefoneFixo">Telefone Fixo:</label>
            <input type="text" id="telefoneFixo" name="telefoneFixo" maxlength="14" placeholder="Ex: (XX) XXXX-XXXX">
            <div class="error-message" id="telefoneFixoError"></div>
          </div>
          <div class="form-group">
            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="email@seuemail.com" required>
          </div>
        </div>
        <div class="column">
          <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
              <option value="outro">Outro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" placeholder="xxxxx-xxx" required>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" placeholder="Sua rua" required>
          </div>
          <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" placeholder="Número" required>
          </div>
          <div class="form-group">
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" placeholder="Complemento">
          </div>
          <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
          </div>
          <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
          </div>
          <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" placeholder="Estado" required>
          </div>        
        </div>        
        <div class="column">
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha..." required>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="confirmarSenha">Confirmação da Senha:</label>
            <input type="password" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme sua Senha..."
              required>
            <p class="error-message"></p>
          </div>
        </div>
      </div>
      <div class="form-group buttons-container">
        <button type="submit">Enviar</button>
        <button type="reset">Limpar Tela</button>
        Caso já possua login, <a href="../login/login.php">clique aqui.</a>
      </div>
    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>
