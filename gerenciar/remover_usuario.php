<?php
require '../usuario/usuario.php';
$usuario = new Usuario();

$status = $usuario->remover($_GET['id']);
 
if (!$status) {
	echo "<h4>Erro ao remover o usuário!</h4>";
} else {	
	header('Location: gerenciar_clientes.php');
	exit;
}
?>
