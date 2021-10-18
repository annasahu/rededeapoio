<?php 
include ("../conexao.php");
include ("produto.php");

if(isset($_POST['submit'])) {
    $idProduto = $_POST['idProduto'];
    $nomeProduto = $_POST['nomeProduto'];
    $idCategoria = $_POST['idCategoria'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $idUsuario = $_POST['idUsuario'];/*VERIFICAR*/

    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $produto = new Produto();
    $status = $produto->atualizar($nomeProduto,$idCategoria,$descricaoProduto,$quantidadeProduto,$idUsuario,$idProduto);
    if (!$status) {
	    echo "<h4>Erro no cadastro! Tente novamente.</h4>";
    } else {
	    header('location: ../usuario/site_produtos_cliente.php');
	    exit;
    } 
    $conexao->close();
}
?> 
