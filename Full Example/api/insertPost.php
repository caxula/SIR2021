<?php
    require_once('connect.php');
    header("Content-Type: application/json");
    $PDO->beginTransaction();

    try {   
        $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
        $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : null;
        $file = isset($_FILES['image']) ? $_FILES['image'] : null;

        if($file['error']) throw new PDOException("Error with file");

        if(!$title || !$text || !$file) throw new PDOException("Required fields missing");

        $image = uniqid(). "." . pathinfo($file['name'], PATHINFO_EXTENSION);

        if(!move_uploaded_file($file['tmp_name'], './uploads/'.$image)) throw new PDOException("Error uploading file");

        $date = date("Y-m-d H:i:s");   

        $query = "INSERT INTO post (title, text, image, date) VALUES (:title, :text, :image, :date)";
        
        $stmt = $PDO->prepare($query);
        
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':date', $date);
        
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