<?php
    require "conexion.php";
    require "CRUD.PHP";

    $model=new CRUD;
    $model->Columns = '*';
    $model->tablaN = "`user_tipo`";
    $model->condition= "";
    $model->Leer();
    $filas=$model->rows;
    //var_dump($filas);

    echo json_encode($filas);
?>