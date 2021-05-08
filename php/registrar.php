<?php
  require "conexion.php";
  require "CRUD.PHP";
  
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];
  $tipo = $_POST['tipo'];

  $model=new CRUD;
  $model->tablaN = "`users`";
  $model->Columns = "`nombre`, `correo`, `contraseña`, `tipo`";
  $model->Values = "'".$nombre."','".$correo."','".$contraseña."','".$tipo."'";
  $model->Crear();
  $mensaje=$model->mensaje;

  echo json_encode($mensaje);
?>
