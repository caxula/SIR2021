<?php 
    $texto = "Hello";
    //echo "<h1>Teste!</h1>";

    $dias = array();
    $dias[] = 'Domingo';
    $dias[] = 'Segunda';
    $dias[] = 'Terça';
    //print_r($dias);

    $today = date('l'); // L -> l
    //echo $today;

    $contador = 1;
    
    /*
    function incrementar($valor){
        return $valor + 1;
    }
    */
    function incrementar(&$valor){
        return $valor = $valor + 1;
    }

    //echo incrementar($contador)."<br>"; // 2
    //echo incrementar($contador)."<br>"; // 3

    $var1 = 1 + 1;
    echo $var1."<br>"; // 2

    $var2 = "1" + 1;
    echo $var2."<br>"; // 2

    $var3 = "1" . 1;
    echo $var3."<br>"; // 11


    foreach($dias as $diasemana){
        echo $diasemana."<br>";
    }

    $a = [
        'bananas' => 1,
        'laranjas' => 2,
        'limoes' => 3,
    ];

    $b = [
        'laranjas' => 2,
        'limoes' => 3,
        'bananas' => 1,
    ];

    foreach($a as $key=>$value){
        echo "Tenho $value $key <br>";
    }

    echo $a == $b ? "São iguais" : "São diferentes";
    /*
        é o mesmo ^
        
        if($a == $b) {
            echo 'São iguais'
        } else {
            echo 'São diferentes'
        }
    */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $texto ?></h1>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    const name = 'SIR2020'
    const age = '26'
    const city = 'New York'
    
    $.ajax({
        // url: 'http://localhost/SIR2021/Aula/euromilhoes.php'
        url: 'euromilhoes.php',
        method: 'GET',
        dataType: 'xml',
        success: function(response){
            console.log(response);
        },
        error: function(error){
            console.log(error)
        }
    })

    $.ajax({
        // url: 'http://localhost/SIR2021/Aula/utilizadores.php?name=SIR2021&age=52&city=Braga'
        // url: 'utilizadores.php?name=SIR2021&age=52&city=Braga'
        url: `utilizadores.php?name=${name}&age=${age}&city=${city}`,
        method: 'GET',
        dataType: 'json',
        success: function(response){
            console.log(response);
        },
        error: function(error){
            console.log(error)
        }
    })

    fetch('euromilhoes.php').then(response=>{
        console.log(response);
        return response.text()
    }).then(result=>{
        console.log(result);
    })

    fetch(`utilizadores.php?name=${name}&age=${age}&city=${city}`).then(response=>{
        console.log(response);
        return response.text()
    }).then(result=>{
        console.log(result);
    })
</script>

</html>