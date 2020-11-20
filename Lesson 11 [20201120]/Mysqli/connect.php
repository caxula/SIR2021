<?php
    $user = "root";
    $pwd = "";
    $host = "localhost";
    $database = "sir";
    $port = '3306';

    $db = new mysqli($host, $user, $pwd, $database, $port);
    
    if($db->connect_errno) {
        die('Error:'.$db->connect_errno);
    }

    //echo "Connected";

    $db->set_charset('utf8');

?>