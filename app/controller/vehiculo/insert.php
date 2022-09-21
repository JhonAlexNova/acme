<?php

    require_once '../../../conexion/config.php';

    if(isset($_POST['insertar'])){
        //crear propietario
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

        $user_id = null;

        if($numero_cedula && $primer_nombre && $apellidos && $direccion && $telefono && $ciudad){
            $sql->execute();
            $user_id = $connect->lastInsertId();
            $role_id = 1;
            $sqlRole = $connect->prepare('INSERT INTO tipo_usuario(user_id, role_id) VALUES(:user_id,:role_id)');
    
            $sqlRole->bindParam(':user_id',$user_id);
            $sqlRole->bindParam(':role_id',$role_id);
    
            $sqlRole->execute();
        }




        //CREAR VEHICULO
        $placa=$_POST['placa'];
        $color=$_POST['color'];
        $marca=$_POST['marca'];
        $tipo_vehiculo_id=$_POST['tipo_vehiculo_id'];

        $sqlVehiculo = "INSERT INTO vehiculos(placa, color, marca, tipo_vehiculo_id, propietario_id) VALUES (:placa,:color,:marca,:tipo_vehiculo_id,:propietario_id)";
        $sqlVehiculo = $connect->prepare($sqlVehiculo);

        $sqlVehiculo->bindParam(':propietario_id',$user_id);
        $sqlVehiculo->bindParam(':tipo_vehiculo_id',$tipo_vehiculo_id);
        $sqlVehiculo->bindParam(':placa',$placa);
        $sqlVehiculo->bindParam(':marca',$marca);
        $sqlVehiculo->bindParam(':color',$color);
        $sqlVehiculo->execute();


       header('Location: /view/vehiculos');
      
    }
?>