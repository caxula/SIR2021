<?php

    $file = $_FILES['fileToUpload'];

    if($file['error']) {
        exit('Erro no upload!');
    }

    if($file['size'] > 4000000) {
        exit('Ficheiro demasiado grande!');
    }

    if($file['type'] != 'image/jpeg') {
        exit('Apenas são permitidos ficheiros JPEG');
    }

    $folderPath = "./uploads/";
    $name = $file['name'];
    $target = $folderPath . $name;

    if(file_exists($target)){
        exit('O ficheiro já existe!');
    }

    if(!move_uploaded_file($file['tmp_name'], $target)){
        exit('Erro ao fazer upload!');
    }

    echo "Upload com sucesso!";


?>