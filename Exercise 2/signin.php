<?php
    session_start();

    if(isset($_SESSION['user'])) {
        header('location: index.php');
    }

    if(isset($_SESSION['erro'])) {
        $erro = $_SESSION['erro'];
        unset($_SESSION['erro']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sessão</title>
</head>
<body>
    <?php
        if(isset($erro)) {
            echo "<p> $erro <p>";
        }
    ?>

<form action="./API/login.php" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="Login">
</form>
    
</body>
</html>