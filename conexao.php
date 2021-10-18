<?php
$host = "127.0.0.1";
$username = "userdel";
$password = "senha";
$db = "fatec";
$conexao = new mysqli($host,$username,$password,$db);

if($conexao->connect_errno) {
    die('Erro('.$conexao->connect_errno.')'.$conexao->connect_error);
}
?>
