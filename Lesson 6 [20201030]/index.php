<?php

    $file = './counter.txt';

    $contador = file_get_contents($file);
    // 61

    if($contador == false) {
        $contador = 1;
    } else {
        $contador = $contador + 1;
        // 62
    }

    file_put_contents($file, $contador)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exmplo PHP</title>
</head>
<body>

    <h1>Número de visitas a esta página: <?php echo $contador ?></h1>
    
</body>
</html>