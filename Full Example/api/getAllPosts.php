<?php 
    require_once('connect.php');
    header("Content-Type: application/json");
    try {
        
        $query = "SELECT *, DATE_FORMAT(date, '%W %M %e %Y') as created from post";

        $result = $PDO->query($query)->fetchAll();

        $response = [
            "errors" => false,
            "results" => count($result),
            "data" => $result
        ];

        echo json_encode($response);

    } catch (PDOException $e) {
        $response = [
            "errors" => true,
            "message" => $e->getMessage()
        ];

        echo json_encode($response);
    }


?>