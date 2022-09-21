<?php
    $sql = "SELECT v.*, t.tipo
        FROM tipo_usuario as tu, vehiculos as v, tipos_vehiculos as t
        WHERE t.id = v.tipo_vehiculo_id
        GROUP BY(v.id)"; 
    $query = $connect->prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 
    

