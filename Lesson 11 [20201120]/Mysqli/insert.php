<?php
    require_once("connect.php");

    $name = "teste2";
    $email = "teste2@mail.com";

    $query = "INSERT INTO user (name, email) VALUES ('$name', '$email')";

    if(!$db->query($query)){
        exit($db->error);
    }

    echo "Inserido com sucesso!";


?>