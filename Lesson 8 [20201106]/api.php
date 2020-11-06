<?php

//var_dump($_POST);

$username = $_REQUEST['username'];
$nome = $_REQUEST['nome'];
$password = $_REQUEST['pwd'];
$idade = $_REQUEST['idade'];
$cp = $_REQUEST['cp'];
$nacionalidade = $_REQUEST['nacionalidade'];
$uuid = $_REQUEST['uuid'];
$equipa = $_REQUEST['equipa'];
$jogadores = isset($_REQUEST['jogadores']) ? $_REQUEST['jogadores'] : 'Sem jogadores';
$comentario = $_REQUEST['comentario'];

// $jogadores = ['Messi', 'Ronaldo', 'Marega'];
// $stringJogadores = implode(' -> ',$jogadores) 
// $stringJogadores = Messi -> Ronaldo -> Marega

$stringJogadores = implode(' - ', $jogadores);

echo "<h4>Username: $username</h4>";
echo "<h4>Nome: $nome</h4>";
echo "<h4>PWD: $password</h4>";
echo "<h4>Idade: $idade</h4>";
echo "<h4>CP: $cp</h4>";
echo "<h4>Nacionalidade: $nacionalidade</h4>";
echo "<h4>UUID: $uuid</h4>";
echo "<h4>Jogadores: $stringJogadores</h4>";
echo "<h4>Comentário: $comentario</h4>";

?>