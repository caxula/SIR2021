<?php
    session_start();
    $user = null;
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    $url = "http://localhost/SIR2021/Exercise%202/API/getBooks.php";
    $json = file_get_contents($url);

    $books = json_decode($json);
    $list = '';
    if($books) {
        foreach($books as $book) {
            $class = $_SESSION && array_key_exists('wish',$_SESSION) && in_array($book->titulo, $_SESSION['wish']) ? 'book wish' : 'book';
    
            if($user) $list .= "<div class='$class' data-title='$book->titulo' onclick='addToWishList(this)'>";
            else $list .= "<div class='$class' data-title='$book->titulo' onclick='notAllowed()'>";
            $list .= "
                <img src='./API/uploads/$book->imagem' />
                <p>Titulo: $book->titulo</p>
                <p>Autor: $book->autor</p>
                <p>Ano: $book->ano</p>
                </div>
            ";
        }
    }
    else $list .= '<p>Não existem livros na biblioteca</p>'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>
    <style>
        .biblioteca {
            display: flex;
        }
        .book {
            width: fit-content;
            text-align: center;
            margin: 10px;
        }

        .wish {
            background-color: bisque;
        }

        .book img {
            max-height: 400px;
        }
    </style>
</head>
<body>
    <?php
        if($user){
            echo "<a href='./add.php'>Adicionar livro</a><br>";
            echo "<a href='./API/logout.php'>Sair</a>";
        }
        else echo "<a href='./signin.php'>Iniciar sessão</a>";
    ?>
    
    <br>
    <br>

    <div><?php if($user) echo "<h3>Olá, $user</h3>" ?></div>

    <div class="biblioteca"><?php echo $list ?></div>
    

</body>

<script>
    function addToWishList(book, user) {
        
        fetch('./API/addWish.php?titulo='+book.getAttribute('data-title')).then(()=>{
            location.reload();
        })
    }

    function notAllowed() {
        if(confirm('É necessário ter sessão iniciada para adicionar à lista de desejos.\nDeseja inicar sessão?')){
            window.location.href = "signin.php"
        }
    }
</script>
</html>