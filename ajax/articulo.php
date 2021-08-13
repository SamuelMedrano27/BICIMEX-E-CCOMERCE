<?php
require_once "../models/Articulo.php";
require_once "../models/Categoria.php";

$articulo = new Articulo();

if ($_POST) {
  if (!$_POST['articulo'] && !$_POST['cantidad']) {
    $idArticulo = limpiarCadena($_POST["idarticulo"]);
    $idCategoria = limpiarCadena($_POST["idcategoria"]);
    $descripcion = limpiarCadena($_POST["descripcion"]);
    $imagen = limpiarCadena($_POST["imagen"]);
    $codigo = limpiarCadena($_POST["codigo"]);
    $nombre = limpiarCadena($_POST["nombre"]);
    $precio = limpiarCadena($_POST["precio"]);
    $stock = limpiarCadena($_POST["stock"]);
  }
}

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (!file_exists($_FILES["imagen"]["tmp_name"]) || !is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
      $imagen = $_POST["imagenactual"];
    } else {
      $ext = explode(".", $_FILES["imagen"]["name"]);
      if ($_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["tpye"] == "image/png") {
        $imagen = round(microtime(true)) . '.' . end($ext);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/articulos/" . $imagen);
      }
    }
    if (empty($idArticulo)) {
      $rspta = $articulo->insertar($idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio);
      echo $rspta
        ? "Articulo registrado"
        : "Articulo no se pudo registrar";
    } else {
      $rspta = $articulo->editar($idArticulo, $idCategoria, $codigo, $nombre, $stock, $descripcion, $imagen, $precio);
      echo $rspta
        ? "Articulo actualizado"
        : "Articulo no se pudo actualizar";
    }
    break;
  case 'desactivar':
    $rspta = $articulo->desactivar($idArticulo);
    echo $rspta
      ? "Articulo desactivado"
      : "Articulo no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $articulo->activar($idArticulo);
    echo $rspta
      ? "Articulo activado"
      : "Articulo no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $articulo->mostrar($idArticulo);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $articulo->listarCondicion();
    $categoria = new Categoria();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $id = $reg->idcategoria;
      $name = $categoria->nombreCategoria($id)['nombre'];
      $data[] = '<div class="card_product col-sm-2 col-md-4 col-xs-6 mt-4"  data-aos="fade-right" data-aos-delay="200">
              <div class="product">
                <div class="product-img">
                  <img src="../img/articulos/' . $reg->imagen . '" class="img-fluid" alt="" width="100px" height="250px">
                </div>
                <div class="product-body">
                  <p class="product-category">' . $name . '</p>
                  <h3 class="product-name"><a href="#">' . $reg->nombre . '</a></h3>
                  <h4 class="product-price"> ' . $reg->precio . '
                    <del class="product-old-price">' . $reg->precio * 1.2 . '</del>
                  </h4>
                  <div class="product-btns">
                    <button class="add-to-wishlist" onclick="addWish(' . $reg->idarticulo . ')">
                      <i class="fa fa-heart-o"></i>
                      <span class="tooltipp">Añadir a deseos</span>
                    </button>
                    <button class="add-to-compare">
                      <i class="fa fa-exchange"></i>
                      <span class="tooltipp">Añadir y Comparar</span>
                    </button>
                    <button class="quick-view">
                      <i class="fa fa-eye"></i>
                      <span class="tooltipp">Vista Rápida</span>
                    </button>
                  </div>
                </div>
                <div class="add-to-cart">
                  <button class="add-to-cart-btn" onclick="addCarOne( ' . $reg->idarticulo . ')">
                  <i class="fa fa-shopping-cart"></i> Añadir al Carro
                  </button>
                </div>
              </div>
              <div class="clearfix visible-sm visible-xs"></div>
            </div>
            ';
    }
    echo json_encode($data);
    break;
  case 'listarAll':
    $rspta = $articulo->listar();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => ($reg->condicion)
          ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')">
              <i class="fa fa-pencil"></i>
            </button>' .
          '<button class="btn btn-danger" onclick="desactivar(' . $reg->idarticulo . ')">
              <i class="fa fa-close"></i>
            </button>'
          : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')">
              <i class="fa fa-pencil"></i>
            </button>' .
          '<button class="btn btn-primary" onclick="activar(' . $reg->idarticulo . ')">
              <i class="fa fa-check"></i>
            </button>',
        "1" => ($reg->nombre),
        "2" => ($reg->categoria),
        "3" => ($reg->codigo),
        "4" => ($reg->stock),
        "5" => '<img src="../img/articulos/' . $reg->imagen . '" height="50px" width="50px">',
        "6" => ($reg->condicion)
          ? '<span class="label bg-green">Activado</span>'
          : '<span class="label bg-red">Desactivado</span>'
      ];
    }
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    ];
    echo json_encode($results);
    break;
  case 'stockPrev':
    $cantidadCar = intval($_POST['cantidadCar']);
    $cantidad = intval($articulo->getStock($_POST['articulo'])['stock']);
    $cantidadUp = intval($_POST['cantidad']);
    $cantidadCar += $cantidadUp;
    $newCantidad = $cantidad - $cantidadCar;
    if ($newCantidad < 0) {
      echo json_encode([
        'statuscode' => 400,
        'results' => "No puede agregar la cantidad $cantidadUp nuestro inventario es de " . $cantidad,
        'data' => [$cantidadCar, $cantidad, $cantidadUp, $newCantidad]
      ]);
    } else {
      echo json_encode([
        'statuscode' => 200,
        'results' => 'SI',
        'data' => [$cantidadCar, $cantidad, $cantidadUp, $newCantidad]
      ]);
    }
    break;
  case 'selectCategoria':
    require_once "../models/Categoria.php";
    $categoria = new Categoria();
    $rspta = $categoria->select();
    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
    }
    break;
}