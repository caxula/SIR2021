<?php
    session_start();

    $USERS = array();
    $USERS['rui'] = "111";
    $USERS['ana'] = "aaa";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_SESSION['user'])) {
        header('location: index.php');
        exit();
        
    } else if(!$username || !$password) {
        $_SESSION['erro'] = "Username ou password em falta";
        header('location: index.php');
        exit();

    } else if(!isset($USERS[$username])){
        $_SESSION['erro'] = "O utilizador não existe!";
        header('location: index.php');
        exit();

    } else if($USERS[$username] != $password){
        $_SESSION['erro'] = "Utilizador e password não coincidem";
        header('location: index.php');
        exit();

    } else {
        $_SESSION['user'] = $username;
        header('location: index.php');
        exit();
    }

?>