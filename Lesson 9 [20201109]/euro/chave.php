<?php

$numeros = array();
$estrelas = array();

function gerar($min, $max, $num){
    $chave = array();

    while(count($chave) < $num){
        $novo = rand($min, $max);

        if(!in_array($novo, $chave)){
            array_push($chave, $novo);
        }
    }

    sort($chave);

    return $chave;
}


$numeros = gerar(1, 50, 5);
$estrelas = gerar(1, 12, 2);

?>