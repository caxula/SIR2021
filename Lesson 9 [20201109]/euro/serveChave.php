<?php
    header("Content-Type: application/json");

    include_once("CGeraChave.php");
    $chave = new GeraChave();

    echo $chave->asJson();
?>