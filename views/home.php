<?php
if (strlen(session_id()) < 1) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BICIMEX</title>
    <link rel="shortcut icon" href="../assets/images/bicimex.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/loader/loaders.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/swiper/swiper.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/lightgallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../public/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/nouislider.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>
    <div class="css-loader">
      <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
    <header>
      <div id="top-header">
        <div class="container">
          <ul class="header-links pull-left">
            <li><a><i class="fa fa-phone"></i> +51 983328458</a></li>
            <li><a><i class="fa fa-envelope-o"></i> bicimex20@gmail.com</a></li>
            <li><a><i class="fa fa-map-marker"></i> Av.Jose Galvez N°853 12650 Tarma, Perú.</a></li>
          </ul>
          <ul class="header-links pull-right">
            <li><a href="contacts.php"><i class="fa fa-phone"></i> Contactos</a></li>
            <?php
            if (!isset($_SESSION['nombre'])) {
              echo '<li><a href="login.php"><i class="fa fa-sign-in"></i> Iniciar Sesión</a></li>
                    <li><a href="register.php"><i class="fa fa-user"></i> Registrarse</a></li>';
            } else {
              echo '<li><a href="person.php"><i class="fa fa-user-circle-o"></i> Mi cuenta</a></li>
                    <li><a href="../ajax/usuario.php?op=salir"><i class="fa fa-sign-out"></i> Salir</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
      <div id="header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="header-logo">
                <a href="#" class="logo">
                  <img src="../assets/images/logo.png" alt="" class="img-responsive"
                       style="width: 600px; height: auto;">
                </a>
              </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-3 clearfix">
              <div class="header-ctn d-flex">
                <?php
                if (isset($_SESSION['nombre'])) {
                  echo '<div>
                    <a href="#" class="" data-toggle="dropdown">
                      <img src="../img/usuarios/' . $_SESSION['imagen'] . '" class="img-circle"
                           alt="User Image" width="40px" height="40px" style="margin-left: -50%;">
                      <span style="margin-top: -25%;">' . $_SESSION['nombre'] . '</span>
                      <input type="hidden" name="idusuario" id="idusuario" value="' . $_SESSION['idusuario'] . '">
                    </a>
                  </div>';
                }
                ?>
                <div>
                  <a href="wish.php" id="cant-wish">
                    <i class="fa fa-heart-o"></i>
                    <span>Deseos</span>
                  </a>
                </div>
                <div class="dropdown" style="padding: 0; margin: 0;">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="cant-car"
                     style="cursor: pointer; margin-top: 0%;">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Carrito</span>
                  </a>
                  <div class="cart-dropdown">
                    <div class="cart-list">
                      <div id="cart-list"></div>
                    </div>
                    <div class="cart-summary" id="cart-summary">
                      <small id="cant-summary"></small>
                      <h5 id="price-subtotal"></h5>
                    </div>
                    <div class="cart-btns">
                      <a href="car.php">Mirar Carro</a>
                      <a href="checkout.php">Hacer Pedido<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <nav id="navigation">
      <div class="container">
        <div id="responsive-nav">
          <ul class="main-nav nav">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="index.php">Productos</a></li>
            <li><a href="bicicletas.php">Bicicletas</a></li>
            <li><a href="accesorios.php">Accesorios</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-12 offset-md-1 col-md-11">
            <div class="swiper-container hero-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide slide-content d-flex align-items-center">
                  <div class="single-slide">
                    <h1 data-aos="fade-right" data-aos-delay="200">
                      Venta de Bicicletas<br>
                    </h1>
                    <p data-aos="fade-right" data-aos-delay="600">
                      Bicicletas super económicas , mejor calidad-precio
                      detodo el mercado nacional <br>con garantía 100%
                    </p>
                    <a data-aos="fade-right" data-aos-delay="900" href="index.php" class="btn btn-primary">
                      Verlas ahora
                    </a>
                  </div>
                </div>
                <div class="swiper-slide slide-content d-flex align-items-center">
                  <div class="single-slide">
                    <h1 data-aos="fade-right" data-aos-delay="200">Venta de Repuestos<br> de bicicletas
                    </h1>
                    <p data-aos="fade-right" data-aos-delay="600">Repuestos de marcas reconocidas <br> mejor
                      calidad-precio de todo el mercado ,con una gran variedad .
                    </p>
                    <a data-aos="fade-right" data-aos-delay="900" href="index.php" class="btn btn-primary">Verlas
                      ahora</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <span class="arr-left"><i class="fa fa-angle-left"></i></span>
        <span class="arr-right"><i class="fa fa-angle-right"></i></span>
      </div>
      <span class="arr-left"><i class="fa fa-angle-left"></i></span>
      <span class="arr-right"><i class="fa fa-angle-right"></i></span>
      </div>
      <div class="texture"></div>
      <div class="diag-bg"></div>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="0">
      <div class="container">
        <div class="cta-content d-sm-flex align-items-center justify-content-around text-center text-xl-left">
          <div class="content" data-aos="fade-right" data-aos-delay="200">
            <h2>¿Qué es BICIMEX?</h2>
            <p>Sinónimo de Calidad-Atención-Respeto</p>
          </div>
        </div>
    </section>
    <section class="pricing-table">
      <div class="container">
        <div class="title text-center">
          <h6 class="title-primary">Productos</h6>
          <h1 class="title-blue">Lo más vendido</h1>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
              <span>Top 2</span>
              <h2>Bicicleta MTB 26"</h2>
              <p class="desc">Click para ver más detalles</p>
              <p class="price">S/325.00</p>
              <p>Marco Dragón</p>
              <p>Aro Doble Pared 26"-ACTION</p>
              <p>18 Cambios</p>
              <p> Freno Cromado(Qilong)</p>
              <p> Asientos New Century</p>
              <p> Aro Doble Pared 26"</p>
              <a href="https://bicimexfisnavi.herokuapp.com/" class="btn btn-primary">Solicítalo</a>
              <svg viewBox="0 0 170 193">
                <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                      d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z"/>
              </svg>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
              <span>Top 1</span>
              <h2>Bicicletas aro 26 " REPLICA ALUMINIO</h2>
              <p class="desc">Click para ver más detalles</p>
              <p class="price">S/375.00</p>
              <p>Marco REPLICA ALUMINIO</p>
              <p>Aro Doble Pared 26"-ACTION</p>
              <p>18 Cambios</p>
              <p> Freno Cromado(Qilong)</p>
              <p> Asientos New Century</p>
              <p> Aro Doble Pared 26"</p>
              <a href="https://bicimexfisnavi.herokuapp.com/" class="btn btn-primary">Solicítalo</a>
              <svg viewBox="0 0 170 193">
                <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                      d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z"/>
              </svg>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="600">
              <span>TOP 3</span>
              <h2>LLantas aro 26"</h2>
              <p class="desc">Click para ver más detalles</p>
              <p class="price">S/25.00</p>
              <p>MARCA "KENDA"</p>
              <p>100% Calidad</p>
              <p>Stock Limitado</p>
              <a href="https://bicimexfisnavi.herokuapp.com/" class="btn btn-primary">Solicítalo</a>
              <svg viewBox="0 0 170 193">
                <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                      d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cta cta2" data-aos="fade-up" data-aos-delay="0">
      <div class="container">
        <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-left">
          <div class="content" data-aos="fade-right" data-aos-delay="200">
            <h2>Y tú que esperas?</h2>
            <p>Ven y unete , se parte de la experiencia ÚNICA de comprar en BICIMEX</p>
          </div>
          <div class="subscribe-btn" data-aos="fade-left" data-aos-delay="400" data-aos-offset="0">
            <a href="index.php" class="btn btn-primary">PRODUCTOS</a>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="footer-widgets">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-xl-3">
              <div class="single-widget contact-widget" data-aos="fade-up" data-aos-delay="0">
                <h6 class="widget-tiltle">&nbsp;</h6>
                <div class="media">
                  <i class="fa fa-map-marker"></i>
                  <div class="media-body ml-3">
                    <h6>Ubícanos</h6>
                    Av.Jose Galvez N°853 12650 Tarma, Perú.
                  </div>
                </div>
                <div class="media">
                  <i class="fa fa-envelope-o"></i>
                  <div class="media-body ml-3">
                    <h6>Tienes alguna pregunta?</h6>
                    <a href="mbicimex20@gmail.com">bicimex20@gmail.com</a>
                  </div>
                </div>
                <div class="media">
                  <i class="fa fa-phone"></i>
                  <div class="media-body ml-3">
                    <h6>Llamanos</h6>
                    <a href="tel:+51983328458"> +51 983328458</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="single-widget recent-post-widget" data-aos="fade-up" data-aos-delay="400">
                <h6 class="widget-tiltle">SOMOS NOTICIA</h6>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post1.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex siempre Puntualidad.</a></h6>
                   
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post2.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex trabajo en equipo.</a></h6>
                    
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post3.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex -Sistema moderno de venta.</a></h6>
                    
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post4.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex a la vanguardia con la TECNOLOGÍA</a></h6>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="single-widget tags-widget" data-aos="fade-up" data-aos-delay="800">
                <h6 class="widget-tiltle">Palabras popularés</h6>
                <a href="bicicletas.php">Bicicletas</a>
                <a href="#">Baratas</a>
                <a href="#">Calidad</a>
                <a href="#">Nuevas</a>
                <a href="#">Repuestos</a>
                <a href="accesorios.php">Accesorios</a>
                <a href="#">Comprar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="foot-note">
        <div class="container">
          <div class="footer-content text-center text-lg-left d-lg-flex justify-content-between align-items-center">
            <p class="mb-0" data-aos="fade-right" data-aos-offset="0" style="color: #FFF;">&copy; 2021 Bicimex COMPANY.</p>
            <p class="mb-0" data-aos="fade-left" data-aos-offset="0" style="color: #FFF;">
              <a href="https://www.facebook.com/samuelito.medranoquispe/" style="color: #FFF;">Design by: @all</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="../public/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/js/slick.min.js"></script>
    <script type="text/javascript" src="../public/js/nouislider.min.js"></script>
    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <script type="text/javascript" src="../public/js/jquery.zoom.min.js"></script>
    <script type="text/javascript" src="../public/js/main.js"></script>
    <script type="text/javascript" src="../public/js/bootbox.min.js"></script>

    <script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../assets/js/loaders.css.js"></script>
    <script type="text/javascript" src="../assets/js/aos.js"></script>
    <script type="text/javascript" src="../assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="../assets/js/lightgallery-all.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
    <script type="text/javascript" src="./scripts/index.js"></script>
  </body>
</html>