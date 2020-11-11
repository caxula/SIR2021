<?php

if(isset($_GET["nome"]) && isset($_GET["cidade"]) && isset($_GET["idade"])) {
    $array = json_decode(file_get_contents('list.json'));

    $obj = [
        'nome'=>$_GET["nome"],
        'cidade'=> $_GET["cidade"],
        'idade'=>$_GET["idade"]
    ];


    if($array == false || !is_array($array)) {
        $array[] = $obj;
    }
    else array_push($array, $obj);

    $myJSON = json_encode($array);

    file_put_contents('list.json', $myJSON);

    echo $myJSON;
}
else {
    $myJSON = json_decode(file_get_contents('list.json'));
    
    echo json_encode($myJSON);
}
?>