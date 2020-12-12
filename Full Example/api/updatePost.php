<?php
    require_once('connect.php');
    header("Content-Type: application/json");
    $PDO->beginTransaction();

    try {   
        $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
        $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : null;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if(!$title || !$text || !$id) throw new PDOException("Required fields missing");

        $date = date("Y-m-d H:i:s");   

        $query = "UPDATE post SET title=:title, text=:text, date=:date WHERE id=:id";
        
        $stmt = $PDO->prepare($query);
        
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':id', $id);
        
        $stmt->execute();

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