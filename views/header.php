<?php
require_once "../models/Car.php";
require_once "../api/Carrito.php";
$carrito = new Carrito();
if (isset($_SESSION['nombre'])) {
  $car = new Car();
  $rspta = $car->listarUsuario($_SESSION['idusuario']);
  $data = [];
  while ($reg = $rspta->fetch_object()) {
    if ($reg->condicion == 'aprovado' || $carrito->load() != null) {
      continue;
    }
    $data[] = '../api/api-carrito.php?action=addTheNumber&id=' . $reg->idarticulo . '&cantidad=' . $reg->cantidad;
  }
}
?>
<script>
  let peticiones = [];
  <?php
  if (isset($_SESSION['nombre'])) {
  for ($i = 0; $i < count($data); $i++) {
  ?>
  peticiones.push(["<?php echo $data[$i] ?>"]);
  <?php
  }
  }
  ?>
</script>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BICIMEX</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/nouislider.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../public/dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/responsive.dataTables.min.css">
  </head>
  <body id="main-body">
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
                  <img src="../assets/images/logo.png" alt="" style="width: 110%; height: 60px;">
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="header-search">
              <form>
                <select class="input-select">
                  <option value="0">Principal</option>
                  <option value="1">Productos</option>
                  <option value="2">Modelos</option>
                  <option value="3">Accesorios</option>
                </select>
                <input class="input" placeholder="Busca aquí">
                <button class="search-btn">Buscar</button>
              </form>
            </div>
          </div>
          <div class="col-md-6 clearfix">
            <div class="header-ctn d-block">
              <?php
              if (isset($_SESSION['nombre'])) {
                echo '<div style="margin-top: -5%;">
                    <a href="#" class="" data-toggle="dropdown">
                      <img src="../img/usuarios/' . $_SESSION['imagen'] . '" class="img-circle"
                           alt="User Image" width="40px" height="40px" style="margin-left: -50%;">
                      <input type="hidden" name="idusuario" id="idusuario" value="' . $_SESSION['idusuario'] . '">
                      <p></p>
                      <span style="margin-left: -50%;">' . $_SESSION['nombre'] . '</span>
                    </a>
                  </div>';
              }
              ?>
              <div style="margin-top: -5%;">
                <a href="wish.php" id="cant-wish">
                  <i class="fa fa-heart-o"></i>
                  <span>Deseos</span>
                </a>
              </div>
              <div class="dropdown">
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
                    <a href="checkout.php">Hacer Pedido
                      <i class="fa fa-arrow-circle-right"></i>
                    </a>
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
    </header>
    <div style="position: -webkit-sticky; position: sticky; top: 0; z-index: +1;">
      <nav id="navigation">
        <div class="container">
          <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
              <li><a href="home.php">Inicio</a></li>
              <li><a href="index.php">Productos</a></li>
              <li><a href="accesorios.php">Accesorios</a></li>
              <li><a href="bicicletas.php">Bicicletas</a></li>
              <li><a href="nosotros.php">Nosotros</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>