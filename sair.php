<?php
session_start();
$emailCliente = '';
$senhaCliente = '';

unset($_SESSION['login_user']);
session_destroy();

header("Location: index.html");
?>
