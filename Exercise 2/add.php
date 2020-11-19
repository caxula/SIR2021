<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar livro</title>
</head>

<body>

    <form id="form" method="POST" action="./API/addBook.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Adicionar livro</legend>

            <label>Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Inserir titulo">

            <br>

            <label>Autor:</label>
            <input type="text" id="autor" name="autor" placeholder="Inserir autor">

            <br>

            <label>Ano:</label>
            <input type="number" id="ano" name="ano" placeholder="Insira o ano">
            <br>

            <label>Imagem:</label>
            <input type="file" name="imagem" id="imagem">

        </fieldset>

        <input type="submit" name="submitbtn" value="Enviar">
        <input type="reset" name="resetbtn" value="Repor">

    </form>
</body>
</html>