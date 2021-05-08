<?php
    require "conexion.php";
    require "CRUD.PHP";

    $model=new CRUD;
    $model->Columns = '*';
    $model->tablaN = "`users`";
    $model->condition= "";
    $model->Leer();
    $filas=$model->rows;
    
    echo json_encode($filas);
?>