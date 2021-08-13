<?php
if (strlen(session_id()) < 1) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BICIMEX Ventas</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dataTables/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
  </head>
  <body style="background-color: #E4E7ED;" class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper" style="overflow: visible;">
      <header class="main-header" style="overflow: visible;">
        <a href="index.php" class="logo">
          <span class="logo-mini"><b>BICIMEX</b>...</span>
          <span class="logo-lg"><b>BICIMEX</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation" style="overflow: visible;">
          <div class="navbar-custom-menu" style="overflow: visible;">
            <ul class="nav navbar-nav" style="overflow: visible;">
              <li class="dropdown user user-menu" style="overflow: visible;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="overflow: visible;">
                  <img
                    src="../img/usuarios/<?php echo isset($_SESSION['imagen']) ? $_SESSION['imagen'] : "default.png"; ?>"
                    class="user-image" alt="User Image">
                  <span
                    class="hidden-xs"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "User"; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img
                      src="../img/usuarios/<?php echo isset($_SESSION['imagen']) ? $_SESSION['imagen'] : "default.png"; ?>"
                      class="img-circle" alt="User Image">
                    <p style="color: black;">
                      Desarollo de Software
                      <small>Joan Roca Hormaza</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="" align="center">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat" style="color: black;">
                        Cerrar Sesión
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </div>