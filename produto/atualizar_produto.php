<?php
include ("../conexao.php");
$id = $_GET['id'];

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM produtos WHERE idProduto = {$id}";
if($result = $conexao->query($sql)) {    
    $obj = $result->fetch_object();
?> 
<html>
<head>
    <title>Formulario para atualizar Produto</title>
    <meta charset="utf-8"/>
</head>
<body>
<h3>Atualizar produto:</h3>
    <form method="POST" action="atualizar_prod.php" enctype="multipart/form-data">
    	<p hidden><input type="number" name="idProduto" value="<?php echo $obj->idProduto; ?>"></p>
        <p hidden><input type="number" name="idUsuario" value="<?php echo $obj->idUsuario; ?>"></p>
        <p hidden><input type="text" name="idCategoria" value="<?php echo $obj->idCategoria; ?>"></p>
        <label>Nome do Produto:</label><br>
        <input type="text" name="nomeProduto" value="<?php echo $obj->nomeProduto; ?>">
        <br><br>
        <label>Quantidade do Produto:</label><br>
        <input type="number" name="quantidadeProduto" value="<?php echo $obj->quantidadeProduto; ?>">
        <br><br>
        <label>Descricao do Produto:</label><br>
        <textarea name="descricaoProduto" rows="10" cols="50"><?php echo $obj->descricaoProduto; ?></textarea> 
        <br><br>
        <input type="submit" name="submit" value="Editar">
        <input type="button" name="buttont" style="margin-left:25px;" onclick="window.location.href='../usuario/site_produtos_cliente.php'" value="Voltar">
    </form>
<?php
    $result->free_result();
} else {
    printf($conexao->error);
}
$conexao->close();  
?>
</body>
</html>
