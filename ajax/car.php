<?php

require_once '../models/Car.php';

$car = new Car();

if ($_POST) {
  $idUsuario = limpiarCadena($_POST['idusuario']);
  $idArticulo = limpiarCadena($_POST['cantidad']);
  $cantidad = limpiarCadena($_POST['cantidad']);
  $condicion = limpiarCadena($_POST['condicion']);
}

switch ($_GET['op']) {
  case 'insertar':
    $rspta = $car->insertar($idUsuario, $idArticulo, $cantidad, $condicion);
    echo $rspta
      ? "Se pudo crear el dato del carrito"
      : "NO se pudo crear el dato del carrito";
    break;
  case 'borrar':
    $rspta = $car->eliminar($idUsuario);
    echo $rspta
      ? "Se pudo eliminar los datos del carrito"
      : "NO se pudo eliminar los datos del carrito";
    break;
  case 'listarUsuario':
    $rspta = $car->listarUsuario($idUsuario);
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = '<div>' . $reg->articulo . '</div>';
    }
    $results = [
      "values" => $data
    ];
    echo json_encode($results);
    break;
  case 'listar':
    $rspta = $car->listar();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => ($reg->idUsuario),
        "1" => ($reg->idArticulo),
        "2" => ($reg->cantidad),
        "3" => ($reg->condicion)
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