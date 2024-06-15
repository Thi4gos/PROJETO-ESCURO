<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Escuro Internet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="img/Escuro logo.png" rel="icon">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="darkmode.css">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a href="../index.html" class="logo me-auto"><img src="img/Escuro logo.png" alt="Logo Escuro"
          class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.html" class="active">Home</a></li>
          <li class="dropdown"><a href="#"><span>Sobre</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../testimonials.html">Depoimentos</a></li>
            </ul>
          </li>
          <li><a href="../services.html">Serviços</a></li>
          <li><a href="../contact.html">Contato</a></li>
          <li><a href="../login e cadastro/login/login.html">Login</a></li>
          <li><a href="../login e cadastro/cadastro.html" class="getstarted">Cadastre-se</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>.navbar -->
    </div>
  </header>End Header -->
  <div class="container">
    <h2 class="text-center mb-4">Alterar Senha</h2>
    <form action="../CORE/alterPass.php" method="post">
      <div class="form-group">
        <label for="currentPassword">Senha Atual:</label>
        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Digite sua senha atual" required>
      </div>
      <div class="form-group">
        <label for="newPassword">Nova Senha:</label>
        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Digite sua nova senha" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirme a Nova Senha:</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua nova senha" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Alterar Senha</button>
    </form>
  </div>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
