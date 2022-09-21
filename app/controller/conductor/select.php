<?php
    $sql = "SELECT u.* FROM usuarios as u, tipo_usuario as tu where tu.role_id = 2 AND u.id = tu.user_id group by(u.id)"; 
    $query = $connect->prepare($sql); 
    $query -> execute(); 
    $resultsConductores = $query -> fetchAll(PDO::FETCH_OBJ); 