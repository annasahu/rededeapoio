<?php
require '../produto/produto.php';
$produto = new Produto();

$status = $produto->remover($_GET['id']);
 
if (!$status) {
	echo "<h4>Erro ao remover o produto!</h4>";
} else {	
	header('Location: ../usuario/site_produtos_cliente.php');
	exit;
}
?>
