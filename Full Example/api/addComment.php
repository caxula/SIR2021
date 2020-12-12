<?php
    require_once('connect.php');
    header("Content-Type: application/json");
    $PDO->beginTransaction();

    try {   
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
        $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : null;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if(!$name || !$text || !$id) throw new PDOException("Required fields missing");

        $date = date("Y-m-d H:i:s");   

        $query = "INSERT INTO comment (name, text, date, post) VALUE (:name, :text, :date, :id)";
        
        $stmt = $PDO->prepare($query);
        
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':id', $id);
        
        $stmt->execute();
        $id = $PDO->lastInsertId();

        $PDO->commit();

        $response = [
            "errors" => false,
            "id" => (int) $id
        ];

        echo json_encode($response);

    } catch(PDOException $e) {
        $PDO->rollBack();
        $response = [
            "errors" => true,
            "message" => $e->getMessage()
        ];

        echo json_encode($response);
    }

?>