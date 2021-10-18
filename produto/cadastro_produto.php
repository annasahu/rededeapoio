<?php
require 'produto.php';
$produto = new Produto();

if(isset($_POST['submit'])){
    $nomeProduto = $_POST['nomeProduto'];
    $idCategoria = $_POST['idCategoria'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $idUsuario = $_POST['idUsuario'];
    
    $status = $produto->inserir($nomeProduto,$idCategoria,$descricaoProduto,$quantidadeProduto,$idUsuario);
    
  if (!$status) {
		echo "<h4>Erro no cadastro! Tente novamente.</h4>";
	} else {
            header('location: ../produto/formulario_produto.php');
      exit;
	}  
}
?>
