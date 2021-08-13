<?php
require_once "../models/Articulo.php";
require_once "../models/Detalle_Venta.php";

$detalle_venta = new Detalle_Venta();

if ($_POST) {
  $idDetalle_Venta = limpiarCadena($_POST["iddetalle_venta"]);
  $precio_venta = limpiarCadena($_POST["precio_venta"]);
  $idArticulo = limpiarCadena($_POST["idarticulo"]);
  $cantidad = limpiarCadena($_POST["cantidad"]);
  $idVenta = limpiarCadena($_POST["idventa"]);
}

switch ($_GET["op"]) {
  case 'venta':
    $articulo = new Articulo();
    $rspta = $detalle_venta->insertar($idVenta, $idArticulo, $cantidad, $precio_venta);
    $cantidadArticulo = $articulo->getStock($idArticulo)['stock'];
    $cantidadArticulo -= $cantidad;
    $articulo->updateStock($idArticulo, $cantidadArticulo);
    echo ($rspta)
      ? "Venta Realizada"
      : "Venta no Realizada";
    break;
  case 'mostrar':
    $rspta = $detalle_venta->mostrar($idVenta);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $detalle_venta->listar();
    $articulo = new Articulo();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $nombre = $articulo->getNombre($reg->idarticulo);
      $data[] = [
        "0" => $reg->idventa,
        "1" => $nombre['nombre'],
        "2" => $reg->cantidad,
        "3" => $reg->precio_venta
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
  default:
    echo 'statuscode 404';
    break;
}
