<?php
    $sql = "SELECT v.*
        FROM tipo_usuario as tu, vehiculos as v, tipos_vehiculos as t
        WHERE t.id = v.tipo_vehiculo_id
        GROUP BY(v.id)"; 
        $query = $connect->prepare($sql); 
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        

    foreach($results as $result){
        //buscar propietario vehiculo
        $sqlPropietario = $connect->prepare('select * from usuarios where id = '.$result->propietario_id);
        $sqlPropietario->execute();
        $resultPropietario = $sqlPropietario->fetch();
        $result->propietario = $resultPropietario;

        //buscar conductor vehiculo
        $sqlConductor = $connect->prepare('select * from usuarios u, conductores_vehiculos cv where cv.conductor_id = u.id AND cv.vehiculo_id = '.$result->id);
        $sqlConductor->execute();
        $resultConductor = $sqlConductor->fetch();
        $result->conductor = $resultConductor;
    }

