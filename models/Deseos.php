<?php

require '../config/connection.php';

class Deseos
{
  public function __construct() {}

  public function insertar($idArticulo, $idUsuario)
  {
    $sql = "INSERT INTO deseos (idarticulo, idusuario) VALUES ('$idArticulo', '$idUsuario')";
    return ejecutarConsulta($sql);
  }

  public function eliminar($idDeseo)
  {
    $sql = "DELETE FROM deseos WHERE iddeseo='$idDeseo'";
    return ejecutarConsulta($sql);
  }

  public function listar()
  {
    $sql = "SELECT * FROM deseos";
    return ejecutarConsulta($sql);
  }

  public function listarUsuario($idUsuario)
  {
    $sql = "SELECT * FROM deseos WHERE idusuario='$idUsuario'";
    return ejecutarConsulta($sql);
  }
}