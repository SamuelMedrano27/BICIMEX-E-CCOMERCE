<?php

require '../config/connection.php';

class Car
{
  public function __construct() {}

  public function insertar($idUsuario, $idArticulo, $cantidad, $condicion)
  {
    $sql = "INSERT INTO carrito (idUsuario,idArticulo,cantidad,condicion) VALUES ('$idUsuario', '$idArticulo', '$cantidad', '$condicion')";
    return ejecutarConsulta($sql);
  }

  public function eliminar($idUsuario)
  {
    $sql = "DELETE FROM carrito WHERE idusario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function listarUsuario($idUsuario)
  {
    $sql = "SELECT * FROM carrito WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function editarCondicion($idUsuario)
  {
    $sql = "UPDATE carrito SET condicion='aprovado' WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM carrito";
    return ejecutarConsulta($sql);
  }
}