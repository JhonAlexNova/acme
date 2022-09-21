<?php
    $sql = "SELECT * FROM tipos_vehiculos"; 
    $query = $connect->prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 