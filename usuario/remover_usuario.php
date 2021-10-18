<?php
require 'usuario.php';
$usuario = new Usuario();

$status = $usuario->remover($_GET['id']);
 
if (!$status) {
	echo "<h4>Erro ao remover o usuário!</h4>";
} else {	
	header('Location: ../gerenciar/gerenciar_produtos.php');
	exit;
}
?>
