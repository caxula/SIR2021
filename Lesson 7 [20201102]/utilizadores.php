<?php

    /*
        $myObject = new stdClass();
        $myObject->name = 'John'
        $myObject->age = 23
        $myObject->city = 'New York'
    */

    //print_r($_REQUEST);
    
    $name = $_GET['name'];
    $age = $_GET['age'];
    $city = $_GET['city'];

    $myObject = [
        'name' => $name,
        'age' => $age,
        'city' => $city
    ];

    /*$array = [
        0 => [
            'name' => 'John',
            'age' => 23,
            'city' => 'New York'
        ],
        1 => [
            'name' => 'Jane',
            'age' => 63,
            'city' => 'New Jersey'
        ]
    ];*/

    header("Content-Type: application/json");
    echo json_encode($myObject);

?>