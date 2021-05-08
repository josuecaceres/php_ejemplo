<?php
    class CRUD{
        //propiedades generales
       public $tablaN;    
       public $Columns;
        
        //propiedades para insert
       public $Values;
        
        //propiedades para select
       public $condition;
       public $rows;
        
        //propiedades para update
       public $update;
       public $set;
        
        //propiedades para delete
       public $deleteFrom;
           
        //Resultado
       public $mensaje;
        
       public function Crear(){
           $model=new Conexion();
           $conexion=$model->conectar();
           $insert_Into=$this->tablaN;
           $insert_Columns=$this->Columns;
           $insert_Values=$this->Values;
           $sql="INSERT INTO $insert_Into ($insert_Columns) VALUES ($insert_Values)";
           $consulta=$conexion->prepare($sql);
           if(!$consulta){
               $this->mensaje="<script>alert('Error al insertar registro');</script>";
           }else{
               $consulta->execute();
               $this->mensaje="Registro añadido";
           }
       }
    
       public function Leer(){
            $model=new Conexion();
            $conexion=$model->conectar();
            $select=$this->Columns;
            $from=$this->tablaN;
            $condition=$this->condition;
            if($condition!=''){
                $condition="WHERE ".$condition;
            }
            $sql="SELECT $select FROM $from $condition";
            $consulta=$conexion->prepare($sql);
            $consulta->execute();
            while($filas=$consulta->fetch()){
                $this->rows[]=$filas;
            }
        }

       public function Actualizar(){
           $model=new Conexion();
           $conexion=$model->conectar();
           $update=$this->update;
           $set=$this->set;
           $condition=$this->condicion;
           if($condition!=''){
               $condition="WHERE ".$condition;
           }
           $sql="UPDATE $update SET $set $condition";
           $consulta=$conexion->prepare($sql);
           if(!$consulta){
               $this->mensaje="<script>alert('Error al tratar de actualizar registro');</script>";
           }else{
               $consulta->execute();
               $this->mensaje="<script>$('#Modal').modal('show');</script>";
           }
       }
       
       public function Borrar(){
           $model=new Conexion();
           $conexion=$model->conectar();
           $deleteFrom=$this->deleteFrom;
           $condition=$this->condicion;
           if($condition!=''){
               $condition="WHERE ".$condition;
           }
           $sql="DELETE FROM $deleteFrom $condition";
           $consulta=$conexion->prepare($sql);
           if(!$consulta){
               $this->mensaje="<script>alert('Error al tratar de eliminar registro');</script>";
           }else{
               $consulta->execute();
               $this->mensaje="<script>$('#Modal').modal('show');</script>";
           }
       }
        
    }
?>