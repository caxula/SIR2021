<?php
    session_start();
    // session_destroy();
    if(isset($_SESSION['user'])){
        header('location: home.php');
    }

    if(isset($_SESSION['erro'])){
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</body>
</html>