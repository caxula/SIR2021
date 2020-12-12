<?php 
    require_once('connect.php');
    header("Content-Type: application/json");
    try {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if(!$id) throw new PDOException("No ID provided");
        
        $query = "SELECT *, DATE_FORMAT(date, '%W %M %e %Y') as created from post WHERE id = :id";

        $stmt = $PDO->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();

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