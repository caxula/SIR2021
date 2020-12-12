<?php 
    require_once('connect.php');
    header("Content-Type: application/json");
    try {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if(!$id) throw new PDOException("No ID provided");
        
        $query = "DELETE from post WHERE id = :id";

        $stmt = $PDO->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $response = [
            "errors" => false,
            "id" => $id
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