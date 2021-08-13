<?php

require_once '../models/Deseos.php';
require_once '../models/Articulo.php';
require_once '../models/Categoria.php';

$deseos = new Deseos();

if ($_POST) {
  $idArticulo = isset($_POST['idarticulo']) ? limpiarCadena($_POST['idarticulo']) : "";
  $idDeseo = isset($_POST['iddeseo']) ? limpiarCadena($_POST['iddeseo']) : "";
  $idUsuario = isset($_POST['idusuario']) ? limpiarCadena($_POST['idusuario']) : "";
}

switch ($_GET['op']) {
  case 'insertar':
    $comp = $deseos->listarUsuario($idUsuario);
    $value = 0;
    while ($reg = $comp->fetch_object()) {
      if ($reg->idarticulo == $idArticulo) {
        echo "Ya agrego este articulo a deseos";
        $value = 1;
      }
    }
    if ($value == 1) {
      break;
    }
    $rspta = $deseos->insertar($idArticulo, $idUsuario);
    echo $rspta
      ? "Se pudo añadir a deseos"
      : "NO se pudo añadir a deseos";
    break;
  case 'borrar':
    $rspta = $deseos->eliminar($idDeseo);
    echo $rspta
      ? "Se quito de deseos"
      : "NO se pudo quitar de deseos";
    break;
  case 'listarUsuario':
    $rspta = $deseos->listarUsuario($idUsuario);
    $articulo = new Articulo();
    $data = [];
    $count = ["count" => 0];
    while ($reg = $rspta->fetch_object()) {
      $results = $articulo->mostrar($reg->idarticulo);
      if ($results['condicion'] == 0) {
        continue;
      }
      $count['count']++;
      $data[] = [
        "0" => $reg->iddeseo,
        "1" => $reg->idarticulo,
        "2" => $reg->idusuario
      ];
    }
    array_push($data, $count);
    echo json_encode($data);
    break;
  case 'listarWish':
    $rspta = $deseos->listarUsuario($idUsuario);
    $articulo = new Articulo();
    $categoria = new Categoria();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $results = $articulo->mostrar($reg->idarticulo);
      if ($results['condicion'] == 0) {
        continue;
      }
      $name = $categoria->nombreCategoria($results['idcategoria'])['nombre'];
      $data[] = '
                  <input type="hidden" id="wishID' . $results['idarticulo'] . '" value="' . $reg->iddeseo . '">
            <div class="col-md-4 col-xs-6">
              <div class="product">
                <div class="product-img">
                  <img src="../img/articulos/' . $results['imagen'] . '" alt="" width="100px" height="250px">
                </div>
                <div class="product-body">
                  <p class="product-category">' . $name . '</p>
                  <h3 class="product-name"><a href="#">' . $results['nombre'] . '</a></h3>
                  <h4 class="product-price"> ' . $results['precio'] . '
                    <del class="product-old-price">' . $results['precio'] * 1.2 . '</del>
                  </h4>
                  <div class="product-btns">
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
                  <buttonn class="add-to-cart-btn" onclick="addCarOne( ' . $results['idarticulo'] . ')">
                  <i class="fa fa-shopping-cart"></i> Añadir al Carro
                  </button>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm visible-xs"></div>
      ';
    }
    echo json_encode($data);
    break;
  case 'listar':
    $rspta = $deseos->listar();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => ($reg->idusuario),
        "1" => ($reg->idarticulo)
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
}