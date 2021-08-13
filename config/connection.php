<?php

require_once "global.php";

// echo  $_ENV['DB_HOST'] . ' ' . $_ENV['DB_USERNAME'] . ' ' . $_ENV['DB_PASSWORD'] . ' ' . $_ENV['DB_DATABASE'];

try {
  $connection = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
  mysqli_query($connection, 'SET NAMES "' . $_ENV['DB_ENCODE'] . '"');
  // echo 'Successfully connection';
} catch (\Throwable $th) {
}

if (mysqli_connect_errno()) {
  printf("Falló la conexión a la base de datos: %s\n", mysqli_connect_errno());
  exit();
}
if (!function_exists('ejecutarConsulta')) {
  function ejecutarConsulta($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    return $query;
  }

  function ejecutarConsultaSimpleFila($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    $row = $query->fetch_assoc();
    return $row;
  }

  function ejecutarConsulta_retornarID($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    return $connection->insert_id;
  }

  function limpiarCadena($str)
  {
    global $connection;
    $str = mysqli_real_escape_string($connection, trim($str));
    return htmlspecialchars($str);
  }
}
