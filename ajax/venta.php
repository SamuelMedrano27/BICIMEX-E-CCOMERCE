<?php

require_once "../models/Venta.php";
require_once "../models/Usuario.php";
require_once "../models/Articulo.php";
require_once "../models/Detalle_Venta.php";
require_once "../api/Carrito.php";

$venta = new Venta();

if ($_POST) {
  $idVenta = limpiarCadena($_POST["idventa"]);
  $clavetransaccion = limpiarCadena($_POST["clavetransaccion"]);
  $paypaldatos = limpiarCadena($_POST["paypaldatos"]);
  $condicion = limpiarCadena($_POST["condicion"]);
}

switch ($_GET["op"]) {
  case 'newVenta':
    if (empty($idVenta)) {
      $usuario = new Usuario();
      $carrito = new Carrito();
      $articulo = new Articulo();
      $detalle_venta = new Detalle_Venta();
      $itemsCarrito = json_decode($carrito->load(), 1);
      $total = 0;
      $totalItems = 0;
      $fullItems = [];
      $data = [];
      foreach ($itemsCarrito as $itemCarrito) {
        $httpRequest = file_get_contents('https://bicimexfisnavi.herokuapp.com/api/api-productos.php?get-item=' . $itemCarrito['id']);
        $itemProducto = json_decode($httpRequest, 1)['item'];
        $itemProducto['cantidad'] = $itemCarrito['cantidad'];
        $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
        $total += $itemProducto['subtotal'];
        $totalItems += $itemProducto['cantidad'];
        array_push($fullItems, $itemProducto);
        $data[] = [
          "0" => $itemProducto['idarticulo'],
          "1" => $itemProducto['cantidad'],
          "2" => round($itemProducto['subtotal'], 2),
        ];
      }
      $idUsuario = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : "6";
      date_default_timezone_set('America/Lima');
      $fecha_hora = date("Y-m-d H:i:s");
      $total_compra = $total;
      $rspta = $venta->insertar($idUsuario, $clavetransaccion, $paypaldatos, $fecha_hora, $total_compra, $condicion);
      $total = round($total, 2);
      $id = $venta->getId($fecha_hora);
      foreach ($data as $d) {
        $reg = $detalle_venta->insertar($id['idventa'], $d[0], $d[1], $d[2]);
      }
      $results = [
        "infoDetalleVenta" => $data,
        "infoVenta" => [
          'total' => $total,
          'items' => $fullItems,
          'idVenta' => $id['idventa'],
          'date' => $fecha_hora
        ]
      ];
      echo json_encode($results);
    }
    break;
  case 'mostrar':
    $rspta = $venta->mostrar($idVenta);
    echo json_encode($rspta);
    break;
  case 'listarPerson':
    $idUsuario = $_GET['id'];
    $rspta = $venta->getUserList($idUsuario);
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->idventa,
        "1" => $reg->clavetransaccion,
        "2" => $reg->fecha_hora,
        "3" => $reg->total_compra,
        "4" => $reg->condicion
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
  case 'listar':
    $rspta = $venta->listar();
    $usuario = new Usuario();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $nombre = $usuario->getNombre($reg->idusuario)['nombre'];
      $data[] = [
        "0" => $nombre,
        "1" => $reg->clavetransaccion,
        "2" => $reg->fecha_hora,
        "3" => $reg->total_compra,
        "4" => $reg->condicion
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
