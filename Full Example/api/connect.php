<?php
    $user = "root";
    $pwd = "";
    $host = "localhost";
    $database = "sir";
    $port = '3306';

    try {

        $PDO = new PDO("mysql:host=$host;dbname=$database", $user, $pwd);

        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Query failed: ".$e->getMessage();
    }


?>