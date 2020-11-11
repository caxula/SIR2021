<?php
    // include_once("chave.php");

    // include_once("CGeraChave.php");
    // $chave = new GeraChave();

    $url = "http://localhost/SIR2021/Aula/serveChave.php";
    $json = file_get_contents($url);
    $chave = json_decode($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>

    <div id="pagehead">
        <h1>Euromilhões</h1>
    </div>

    <div class="chave">
        <ul class="numeros">
            <?php
                foreach ($chave->numeros as $value) {
                    echo "<li>$value</li>";
                }
            ?>
        </ul>
        <ul class="estrelas">
            <?php
                foreach ($chave->estrelas as $value) {
                    echo "<li>$value</li>";
                }
            ?>
        </ul>
    </div>

</body>
</html>