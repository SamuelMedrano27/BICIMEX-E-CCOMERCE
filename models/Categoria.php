<?php

require '../config/connection.php';
require_once 'Articulo.php';

class Categoria
{
  public function __construct() {}

  public function insertar($nombre, $descripcion)
  {
    $sql = "INSERT INTO categoria (nombre,descripcion,condicion) VALUES ('$nombre','$descripcion', '1')";
    return ejecutarConsulta($sql);
  }

  public function editar($idCategoria, $nombre, $descripcion)
  {
    $sql = "UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria='$idCategoria'";
    return ejecutarConsulta($sql);
  }

  public function activar($idCategoria)
  {
    $sql = "UPDATE categoria SET condicion='1' WHERE idcategoria='$idCategoria'";
    $articulo = new Articulo();
    $values = $articulo->listar();
    while ($reg = $values->fetch_object()) {
      if ($reg->idcategoria == $idCategoria) {
        $sql2 = "UPDATE articulo SET condicion='1' WHERE idarticulo='$reg->idarticulo'";
        ejecutarConsulta($sql2);
      }
    }
    return ejecutarConsulta($sql);
  }

  public function desactivar($idCategoria)
  {
    $sql = "UPDATE categoria SET condicion='0' WHERE idcategoria='$idCategoria'";
    $articulo = new Articulo();
    $values = $articulo->listarCondicion();
    while ($reg = $values->fetch_object()) {
      if ($reg->idcategoria == $idCategoria) {
        $sql2 = "UPDATE articulo SET condicion='0' WHERE idarticulo='$reg->idarticulo'";
        ejecutarConsulta($sql2);
      }
    }
    return ejecutarConsulta($sql);
  }

  public function mostrar($idCategoria)
  {
    $sql = "SELECT * FROM categoria WHERE idcategoria='$idCategoria'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM categoria";
    return ejecutarConsulta($sql);
  }

  public function select()
  {
    $sql = "SELECT * FROM categoria WHERE condicion=1";
    return ejecutarConsulta($sql);
  }

  public function nombreCategoria($idCategoria)
  {
    $sql = "SELECT nombre FROM categoria WHERE idcategoria='$idCategoria'";
    return ejecutarConsultaSimpleFila($sql);
  }
}
