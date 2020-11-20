<?php 
    require_once('connect.php');

    try {
        
        $query = "SELECT * from user";

        $result = $PDO->query($query)->fetchAll();

        echo json_encode($result);

    } catch (PDOException $e) {
        die('Ocorreu um erro:'.$e->getMessage());
    }


?>