<?php
    require_once("connect.php");

    $query = "SELECT * FROM user";
    $result = $db->query($query);

    $list = [];

    while($user = $result->fetch_assoc()){
        $list[] = $user;
    }

    echo json_encode($list);
?>