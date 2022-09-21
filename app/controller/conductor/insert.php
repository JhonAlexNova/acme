<?php

    require_once '../../../conexion/config.php';

    if(isset($_POST['insertar'])){
        
        $numero_cedula=$_POST['numero_cedula'];
        $primer_nombre=$_POST['primer_nombre'];
        $segundo_nombre =$_POST['segundo_nombre'];
        $apellidos=$_POST['apellidos'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $ciudad = $_POST['ciudad'];

       

        $sql="insert into usuarios(numero_cedula,primer_nombre,segundo_nombre,apellidos,direccion,telefono,ciudad) values(:numero_cedula,:primer_nombre,:segundo_nombre,:apellidos,:direccion,:telefono,:ciudad)";
        $sql = $connect->prepare($sql);

       
        $sql->bindParam(':numero_cedula',$numero_cedula);
        $sql->bindParam(':primer_nombre',$primer_nombre);
        $sql->bindParam(':segundo_nombre',$segundo_nombre);
        $sql->bindParam(':apellidos',$apellidos);
        $sql->bindParam(':direccion',$direccion);
        $sql->bindParam(':telefono',$telefono);
        $sql->bindParam(':ciudad',$ciudad);
        $sql->execute();

        $user_id = $connect->lastInsertId();

        $role_id = 2;
        $sqlRole = $connect->prepare('INSERT INTO tipo_usuario(user_id, role_id) VALUES(:user_id,:role_id)');

        $sqlRole->bindParam(':user_id',$user_id);
        $sqlRole->bindParam(':role_id',$role_id);

        $sqlRole->execute();

        //CREAR ASIGNACION CONDUCTOR VEHICULO

        $vehiculo_id = $_POST['vehiculo_id'];

        $sqlConductorVehiculo = "INSERT INTO conductores_vehiculos(vehiculo_id,conductor_id) VALUES (:vehiculo_id,:conductor_id)";
        $sqlConductorVehiculo = $connect->prepare($sqlConductorVehiculo);

        $sqlConductorVehiculo->bindParam(':vehiculo_id',$vehiculo_id);
        $sqlConductorVehiculo->bindParam(':conductor_id',$user_id);
        $sqlConductorVehiculo->execute();


        header('Location: /view/conductores');
      
    }
?>