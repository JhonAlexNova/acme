<?php

    require_once '../../../conexion/config.php';

    if(isset($_POST['insertar'])){
        
        $vehiculo_id=$_POST['vehiculo_id'];
        $conductor_id=$_POST['conductor_id'];

       

        $sql="insert into conductores_vehiculos(conductor_id,vehiculo_id) values(:conductor_id,:vehiculo_id)";
        $sql = $connect->prepare($sql);

       
        $sql->bindParam(':conductor_id',$conductor_id);
        $sql->bindParam(':vehiculo_id',$vehiculo_id);
        $sql->execute();


        header('Location: /view/informe');
      
    }
?>