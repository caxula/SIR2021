<?php

$titulo = $_REQUEST['titulo'];
$autor = $_REQUEST['autor'];
$ano = $_REQUEST['ano'];
$imagem = $_FILES['imagem'];


if($titulo && $autor && $ano && $imagem) {

    if ($imagem['error']) {
        exit("erro de upload");
    }
    if ($imagem['size'] > 4000000) {
        exit("demasido grande");
    }

    if (mime_content_type($imagem['tmp_name']) != "image/jpeg") {
        exit("Não é JPEG");
    }

    $basePath = "uploads/";
    $fileName = $imagem['name'];
    $targetPath = $basePath . $fileName;

    if (!move_uploaded_file($imagem['tmp_name'],$targetPath)) {
        exit ("erro ao escrever");
    }

    $array = json_decode(file_get_contents('list.json'));

    $obj = [
        'titulo'=> $titulo,
        'autor'=> $autor,
        'ano'=>$ano,
        'imagem'=> $fileName
    ];


    if($array == false || !is_array($array)) {
        $array[] = $obj;
    }
    else array_push($array, $obj);

    $myJSON = json_encode($array);

    file_put_contents('list.json', $myJSON);

    header('location: ../index.php');
}
else {
    echo "Faltam dados";
}
?>