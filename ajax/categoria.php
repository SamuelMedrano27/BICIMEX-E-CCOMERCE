<?php

require_once "../models/Categoria.php";

$categoria = new Categoria();

if ($_POST) {
  $idCategoria = limpiarCadena($_POST["idcategoria"]);
  $descripcion = limpiarCadena($_POST["descripcion"]);
  $direccion = limpiarCadena($_POST["direccion"]);
  $nombre = limpiarCadena($_POST["nombre"]);
}

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($idCategoria)) {
      $rspta = $categoria->insertar($nombre, $descripcion);
      echo $rspta
        ? "Categoria registrada"
        : "La categoria no se pudo registrar";
    } else {
      $rspta = $categoria->editar($idCategoria, $nombre, $descripcion);
      echo $rspta
        ? "Categoria actualizada"
        : "La categoria no se pudo actualizar";
    }
    break;
  case 'activar':
    $rspta = $categoria->activar($idCategoria);
    echo $rspta
      ? "Categoria activada"
      : "Categoria no se pudo activar";
    break;
  case 'desactivar':
    $rspta = $categoria->desactivar($idCategoria);
    echo $rspta
      ? "Categoria desactivada"
      : "Categoria no se pudo desactivar";
    break;
  case 'mostrar':
    $rspta = $categoria->mostrar($idCategoria);
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $categoria->listar();
    $data = [];
    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => ($reg->condicion)
          ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')">
              <i class="fa fa-pencil"></i>
             </button>' .
          '<button class="btn btn-danger" onclick="desactivar(' . $reg->idcategoria . ')">
              <i class="fa fa-close"></i>
             </button>'
          : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')">
              <i class="fa fa-pencil"></i>
             </button>' .
          '<button class="btn btn-primary" onclick="activar(' . $reg->idcategoria . ')">
             <i class="fa fa-check"></i>
             </button>',
        "1" => $reg->nombre,
        "2" => $reg->descripcion,
        "3" => ($reg->condicion)
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
}