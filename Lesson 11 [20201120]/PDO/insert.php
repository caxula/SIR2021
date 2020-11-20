<?php

    require_once('connect.php');

    try {   

        $name = "testePDO";
        $mail = "testePDO@mail.com";

        $PDO->beginTransaction();

        $query = "INSERT INTO user (name, email) VALUE (:name, :mail)";
        
        // $query = "INSERT INTO user (name, email) VALUE (?, ?)";
        // $stmt->execute([$name, $mail]);

        $stmt = $PDO->prepare($query);
        
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':mail', $mail);
        
        $stmt->execute();
        
        $PDO->commit();

        exit("Inserido com sucesso");

    } catch(PDOException $e) {
        echo "Query failed: ".$e->getMessage();
        $PDO->rollBack();
    }

?>