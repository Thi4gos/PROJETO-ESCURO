<?php 
  require_once "CORE/ValidSessao.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Escuro Internet</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/Escuro logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="darkmode.css">
  <link href="assets/css/style.css" rel="stylesheet">                                     
</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto"><img src="assets/img/Escuro logo.png" alt="Logo Escuro" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li class="dropdown"><a href="#"><span>Sobre</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="view/testimonials.html">Depoimentos</a></li>
            </ul>
          </li>
          <li><a href="view/services.html">Serviços</a></li>
          <li><a href="view/contact.html">Contato</a></li>
          <!-- MENU ADAPTATIVO CONFORME ACESSO -->
          <?php if (isset($nomeUsuario)): ?>
            <li><a href="#">Olá, <?php echo $nomeUsuario; ?></a></li>
            <?php if ($tipoAcesso == 'admin'): ?>
              <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
              <!-- Adicione mais links administrativos conforme necessário -->
            <?php endif; ?>
            <li><a href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a href="view/login/login.php">Login</a></li>
            <li><a href="view/cadastro/cadastro.php" class="getstarted">Cadastre-se</a></li>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Navegue com Velocidade e Segurança com Escuro</h2>
              <p class="animate__animated animate__fadeInUp">Escuro Internet oferece velocidade relâmpago e segurança
                impenetrável para sua experiência online. Navegue sem limites, transmita seus filmes favoritos e proteja
                seus dados pessoais com nossa conexão ultrarrápida e criptografada. Junte-se à revolução digital com
                Escuro</p>
              <a href="view/services.html" class="btn-get-started animate__animated animate__fadeInUp scrollto">Serviços</a>
            </div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Privacidade Incomparável</h2>
              <p class="animate__animated animate__fadeInUp">Proteja sua identidade e dados pessoais enquanto navega na
                web.</p>
              <a href="view/services.html" class="btn-get-started animate__animated animate__fadeInUp scrollto">Serviços</a>
            </div>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Performance Consistente</h2>
              <p class="animate__animated animate__fadeInUp">Não importa a hora do dia ou a demanda na rede, nossa
                velocidade permanece constante, garantindo uma experiência confiável em todos os momentos.</p>
              <a href="view/services.html" class="btn-get-started animate__animated animate__fadeInUp scrollto">Serviços</a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    </div>
  </section>
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2>Só com a Escuro você tem</h2>
            <h3>Os principais apps ilimitados e muito mais!</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Conheça nossos planos que custam muito menos que uma bolinha de golfe
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Internet Segura</li>
              <li><i class="ri-check-double-line"></i>Ultra Velocidade</li>
              <li><i class="ri-check-double-line"></i>Apps Ilimitados</li>
            </ul>
            <h3>Veja os principais apps:</h3>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4>Celular</h4>
              <p>A melhor rede móvel, ainda mais rápida com o 5G</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4>TV</h4>
              <p>Programação completa em HD para toda a família</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4>Fibra Óptica</h4>
              <p>A melhor conexão para sua casa
              </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4>Escolha seu Produto</h4>
              <p>Planos de internet e TV com descontos</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Escuro</h3>
              <p>
                Av. Rio Branco, 156 - Centro, Rio de Janeiro - RJ<br>
                RJ 20040-905, BR<br><br>
                <strong>Celular:</strong> 40028922<br>
                <strong>Email:</strong> escuro@hotmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Entre em contato conosco</h4>
            <p>Digite seu E-mail:</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Enviar">
            </form>

          </div>

        </div>
      </div>
    </div>


  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="darkmode.js"></script>
  <script src="assets/js/main.js"></script>
</body>r
</html>