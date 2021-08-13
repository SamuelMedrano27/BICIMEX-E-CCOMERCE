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
    <link rel="stylesheet" type="text/css" href="../public/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/nouislider.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/loader/loaders.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/swiper/swiper.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/lightgallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
    <div class="css-loader">
      <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-12 offset-md-1 col-md-11">
            <div class="swiper-container hero-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide slide-content d-flex align-items-center">
                  <div class="single-slide">
                    <h1 data-aos="fade-right" data-aos-delay="200">Venta de
                      Bicicletas<br>
                    </h1>
                    <p data-aos="fade-right" data-aos-delay="600"> Bicicletas super económicas, mejor calidad-precio
                      detodo el mercado nacional <br>con garantía 100%
                    </p>
                    <a data-aos="fade-right" data-aos-delay="900" href="index.php" class="btn btn-primary">Verlas
                      ahora</a>
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
      <div class="texture"></div>
      <div class="diag-bg"></div>
    </section>
    <section class="cta" data-aos="fade-up" data-aos-delay="0">
      <div class="container">
        <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-left">
          <div class="content" data-aos="fade-right" data-aos-delay="200">
            <h2>Qué es BICIMEX?</h2>
            <p>Sinónimo de Calidad-Atención-Respeto</p>
          </div>
        </div>
      </div>
    </section>
    <section class="services">
      <div class="container">
        <div class="title text-center">
          <h6>NOSOTROS</h6>
          <h1 class="title-blue">Por qué ELEGIRNOS?</h1>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-lg-4">
              <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <img class="mr-4" src="../assets/images/service1.png" alt="Web Development">
                <div class="media-body">
                  <h5>RESPONSABILIDAD</h5>
                  Somos estrictos con nuestro horario de trabajo.
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="media" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                <img class="mr-4" src="../assets/images/service2.png" alt="Web Development">
                <div class="media-body">
                  <h5>CALIDAD</h5>
                  Contamos con productos de primera calidad.
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                <img class="mr-4" src="../assets/images/service3.png" alt="Web Development">
                <div class="media-body">
                  <h5>INNOVACIÓN</h5>
                  Nos caracterizamos por trabajar de una manera diferente, única e inigualable.
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <img class="mr-4" src="../assets/images/service4.png" alt="Web Development">
                <div class="media-body">
                  <h5>MODERNIDAD</h5>
                  Contamos con infraestructura moderna , ideal para nuestros clientes.
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                <img class="mr-4" src="../assets/images/service5.png" alt="Web Development">
                <div class="media-body">
                  <h5>PRECIOS BAJOS</h5>
                  Contamos con los precios más bajos del mercado.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="trust">
      <div class="container">
        <div class="row">
          <div class="offset-xl-1 col-xl-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
            <div class="title">
              <h6 class="title-primary">acerca de NOSOTROS</h6>
              <h1>Quíenes SOMOS?</h1>
            </div>
            <p>Somos una empresa dedicada a la comercialización de Bicicletas y sus accesorios de alta calidad y 100%
              recomendados.
            </p>
          </div>
          <div class="col-xl-5 gallery">
            <div class="row no-gutters h-100">
              <a class="w-50 h-100 gal-img" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <img class="img-fluid" src="../assets/images/loguito.jpg">
                <i class="fa fa-caret-right"></i>
              </a>
            </div>
          </div>
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
    <section class="testimonial-and-clients">
      <div class="container">
        <div class="testimonials">
          <div class="swiper-container test-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide text-center">
                <div class="row">
                  <div class="offset-lg-1 col-lg-10">
                    <div class="test-img" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0"><img
                        src="../assets/images/samuel.png" alt="Testimonial 1"></div>
                    <h5 data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-offset="0">SAMUEL
                      Medrano</h5>
                    <span data-aos="fade-up" data-aos-delay="400" data-aos-duration="600"
                          data-aos-offset="0">Gerente </span>
                  </div>
                </div>
              </div>
              <div class="swiper-slide text-center">
                <div class="row">
                  <div class="offset-lg-1 col-lg-10">
                    <div class="test-img" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0"><img
                        src="../assets/images/heimi.png" alt="Testimonial 1"></div>
                    <h5 data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-offset="0">HEIMI
                      MAYTA</h5>
                    <span data-aos="fade-up" data-aos-delay="400" data-aos-duration="600" data-aos-offset="0">ADMINISTRADORA</span>
                  </div>
                </div>
              </div>
              <div class="swiper-slide text-center">
                <div class="row">
                  <div class="offset-lg-1 col-lg-10">
                    <div class="test-img" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0">
                      <img src="../assets/images/sarita.png" alt="Testimonial 1">
                    </div>
                    <h5 data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-offset="0">
                      ZARAÍ MEDRANO
                    </h5>
                    <span data-aos="fade-up" data-aos-delay="400" data-aos-duration="600" data-aos-offset="0">
                      MARKETING Designer
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="test-pagination"></div>
          </div>
        </div>
        <div class="clients" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
          <div class="swiper-container clients-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="../assets/images/client1.png" alt="Client 1">
              </div>
              <div class="swiper-slide">
                <img src="../assets/images/client2.png" alt="Client 2">
              </div>
              <div class="swiper-slide">
                <img src="../assets/images/client3.png" alt="Client 3">
              </div>
              <div class="swiper-slide">
                <img src="../assets/images/client4.png" alt="Client 4">
              </div>
              <div class="swiper-slide">
                <img src="../assets/images/client5.png" alt="Client 5">
              </div>
            </div>
            <div class="test-pagination"></div>
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
                    <p><i class="fa fa-user"></i>Exitosa </p>
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post2.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex trabajo en equipo.</a></h6>
                    <p><i class="fa fa-user"></i>RADIO Tarma </p>
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post3.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex -Sistema moderno de venta.</a></h6>
                    <p><i class="fa fa-user"></i>SUDAMERICA NOTICIAS </p>
                  </div>
                </div>
                <div class="media">
                  <a class="rcnt-img" href="#"><img src="../assets/images/rcnt-post4.png" alt="Recent Post"></a>
                  <div class="media-body ml-3">
                    <h6><a href="#">Bicimex a la vanguardia con la TECNOLOGÍA</a></h6>
                    <p><i class="fa fa-user"></i>Abel Hurtado </p>
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
            <p class="mb-0" data-aos="fade-right" data-aos-offset="0">&copy; 2021 Bicimex COMPANY.</p>
            <p class="mb-0" data-aos="fade-left" data-aos-offset="0">
              <a href="https://www.facebook.com/samuelito.medranoquispe/">Design by: Samuel Medrano</a>
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