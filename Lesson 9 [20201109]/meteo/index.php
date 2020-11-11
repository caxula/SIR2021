<?php

    if(isset($_GET['localidade'])){
        $local = urlencode($_GET['localidade']);
        
        $geo_url = "http://www.mapquestapi.com/geocoding/v1/address";
        $geo_key = "XFNxQ82etHEFDAjhOSzhE4hozjwbRq45";
        $geo_url_api = "$geo_url?key=$geo_key&location=$local";

        $geoJSON = file_get_contents($geo_url_api);
        $geoPHP = json_decode($geoJSON);

        $lat = $geoPHP->results[0]->locations[0]->latLng->lat;
        $lng = $geoPHP->results[0]->locations[0]->latLng->lng;

        $localidade = $geoPHP->results[0]->locations[0]->adminArea5;
        $pais = $geoPHP->results[0]->locations[0]->adminArea1;

        /****************************************************/

        $meteo_url = "https://api.darksky.net/forecast";
        $meteo_key = "814e5b27d87937feb926c8b0178f77c3";
        $params = "units=si";
        $meteo_url = "$meteo_url/$meteo_key/$lat,$lng?$params";

        $meteoJSON = file_get_contents($meteo_url);
        $meteoPHP = json_decode($meteoJSON);

        $temperatura = $meteoPHP->currently->temperature;
        $icon = $meteoPHP->currently->icon;
        $icon_url = "https://darksky.net/images/weather-icons/$icon.png";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="index.php">
        <input type="text" name="localidade" />
        <input type="submit" value="Submeter" />
    </form>

    <?php 
        if(isset($_GET['localidade'])){
            echo "
                <h1>Estado do tempo em $localidade, $pais</h1>
                <h4>Temperatura: $temperatura ºC</h4>
                <img src='$icon_url' />
            ";
        }
    ?>
</body>
</html>