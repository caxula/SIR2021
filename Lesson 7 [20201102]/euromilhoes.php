<?php

    $numeros = array(1,2,3,4,5);
    $estrelas = array(1,2);

    $chaveXML = new simpleXMLElement('<chave/>');
    /*
        <chave>

        </chave>
    */

    $numerosXML = $chaveXML->addChild('numeros');    
    $estrelasXML = $chaveXML->addChild('estrelas'); 
    /*
        <chave>
            <numeros></numeros>
            <estrelas></estrelas>
        </chave>
    */ 

    foreach ($numeros as $value) {
        $numerosXML->addChild('numero', $value);
    }

    foreach ($estrelas as $value) {
        $estrelasXML->addChild('estrela', $value);
    }

    /*
        <chave>
            <numeros>
                <numero>1</numero>
                <numero>2</numero>
                <numero>3</numero>
                <numero>4</numero>
                <numero>5</numero>
            </numeros>
            <estrelas>
                <estrela>1</estrela>
                <estrela>2</estrela>
            </estrelas>
        </chave>
    */ 

    header("Content-Type: application/xml");
    echo $chaveXML->asXML();

?>