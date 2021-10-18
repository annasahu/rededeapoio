<?php
session_cache_expire(15);
session_start ();

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}

require '../conexao.php';
require '../itemPro.php';
?>
<html>
<head>
    <title>Carrinho: Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
</head>
<body>	
	<div class="margin">
		<h3>Produtos adicionados no Carrinho de Doa&ccedil;&atilde;o:</h3>
	</div><br>
		<?php
		if (isset ( $_GET ['idPro'] ) && !isset($_POST['updatePro'])) {
			$resultado = mysqli_query($conexao,'SELECT * FROM produtos WHERE idProduto=' . $_GET ['idPro'] );
			$produto = mysqli_fetch_object($resultado);
			$itemPro = new ItemPro($produto->idProduto, $produto->nomeProduto);
			$itemPro->setQuant(1);
			// Verifica a existência do produto no carrinho
			$index = -1;
			if (isset ( $_SESSION ['cartPro'] )) {
				$cartPro = unserialize ( serialize ( $_SESSION ['cartPro'] ) );
				for($i = 0; $i < count ( $cartPro ); $i ++) {
					if ($cartPro [$i]->getId() == $_GET ['idPro']) {
						$index = $i;
						break;
					}
				}
			}
			if ($index == - 1) {
				$_SESSION ['cartPro'] [] = $itemPro;
			} else {
				$cartPro [$index]->maisQuant();
				$_SESSION ['cartPro'] = $cartPro;
			}
		}
		// Remove o produto do carrinho
		if (isset ( $_GET ['index'] ) && !isset($_POST['updatePro'])) {
			$cartPro = unserialize ( serialize ( $_SESSION ['cartPro'] ) );
			unset ( $cartPro [$_GET ['index']] );
			$cartPro = array_values ( $cartPro );
			$_SESSION ['cartPro'] = $cartPro;
		}
		// Atualiza a quantidade no carrinho
		if(isset($_POST['updatePro'])) {
			$arrQuantity = $_POST['quantPro'];
			// Verifica a validade da quantidade
			$valid = 1;
			for($i=0; $i<count($arrQuantity); $i++) {
				if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1) {
					$valid = 0;
					break;
				}
			}
			if($valid==1) {
				$cartPro = unserialize ( serialize ( $_SESSION ['cartPro'] ) );
				for($i = 0; $i < count ( $cartPro ); $i ++) {
					$cartPro[$i]->setQuant($arrQuantity[$i]);
				}
				$_SESSION ['cartPro'] = $cartPro;
			} else {
				$error = 'Quantidade Inválida';
			}
		}
		?>
	<div class="w3-responsive margin">
		<!-- Tabela que mostra os Produtos existentes no Carrinho de Compras -->
		<?php echo isset($error) ? $error : ''; ?>
		<form method="post">
			<table cellpadding="2" cellspacing="2" border="0" class="tablecart w3-table-all w3-hoverable" style="width:80%">
				<tr class="w3-black">					
					<th class="thcart"><center>Nome</center></th>
					<th class="thcart"><center>Quantidade</center></th>
					<th class="thcart"><center>Op&ccedil;&atilde;o</center></th>
				</tr>
				<?php header("Content-type: text/html; charset=iso-8859-1");
				$cartPro = unserialize ( serialize ( $_SESSION ['cartPro'] ) );
				$index = 0;
				for($i = 0; $i < count ( $cartPro ); $i ++) {
				?>
				<tr>
					<td><center><?php echo $cartPro[$i]->getNome(); ?></center></td>
					<td><center><input type="text" value="<?php echo $cartPro[$i]->getQuant(); ?>"
					style="width: 50px;" name="quantPro[]">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="height:25px" type="image" src="../imagens/update.png" value="Modificar"><input type="hidden" name="updatePro"></center></td>
					<td><center><a href="carrinhoPro.php?index=<?php echo $index; ?>"><img style="height:25px" src="../imagens/delete.png"></a></center></td>
				</tr>
				<?php
				$index ++;
				}
				?>
			</table>
		</form>
	</div>

	<br>
	<!-- Botoes do Carrinho de Compras -->
	<div class="margin">
		<div class="row-cart">
			<div class="col-cart">
				<a href="site_cliente.php"><button type="button">Voltar</button></a><br><br>
			</div>
			<div class="col-cart">
				<a href="#"><button type="button">Finalizar</button></a>
			</div>
		</div>
	</div>
</body>
</html>
