<?php
session_cache_expire(15);
session_start();
require '../produto/produto.php';

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}

$produto = new Produto();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gerenciamento: Produtos</title>
    <meta charset="utf-8"/>    
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
		function confirmaRemover() {
			var rem = confirm("Você deseja remover?");
            if(rem) {
                return true;
            } else {
                return false;
            }
		}
        function menuBarra() {
            var bar = document.getElementById("myTopnav");
            if (bar.className === "topnav") {
                bar.className += " responsive";
            } else {
                bar.className = "topnav";
            }
        } 
	</script>
</head>
<body>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="#" class="active">Produtos</a>
            <a href="gerenciar_clientes.php">Clientes</a>
            <a href="../sair.php">Sair</a>        
            <a href="javascript:void(0);" class="icon" onclick="menuBarra()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </nav>
    <section>
        <div class="margin">
            <?php echo "<h4>Seja bem vindo " . $_SESSION['login_user'] . "!</h4>"; ?>
        </div>
        <div class="margin">
            <h2>Lista de Produtos: </h2>
            <?php
            $count = $produto->contar();
            if($count < 1) {
                echo "<h4>Nenhum registro no Banco de Dados.</h4>"; 
            } else { 
                echo "<h4>Foi(ram) encontrado(s) {$count} produto(s) cadastrado(s).</h4>";
                foreach($produto->listar() as $value) {
                    echo "Id: {$value['idProduto']}<br>";
                    echo "Nome: {$value['nomeProduto']};<br>Categoria: {$value['nomeCategoria']};<br>Descricao: {$value['descricaoProduto']};
                    <br>Quantidade: {$value['quantidadeProduto']};<br>";
                    echo "<a onclick='return confirmaRemover();' href='remover_produto.php?id=" . $value["idProduto"] . "'>Remover</a><br><br>";
                }
            }
            ?>         
        </div>
    </section>
</body>
</html>