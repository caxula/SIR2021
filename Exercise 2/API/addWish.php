<?php
    session_start();
    
    if($_GET['titulo']) {
        $nome=$_GET['titulo'];
        if(!in_array($nome, $_SESSION['wish'])) {
            $_SESSION['wish'][]=$nome;
        }
        else {
            if (($key = array_search($nome, $_SESSION['wish'])) !== false) {
                unset($_SESSION['wish'][$key]);
            }
        }
    }
    session_write_close();
?>