<?php
session_cache_expire(15);
session_start();

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}
include ("../conexao.php");

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 
<html>
<head>
    <title>Produtos disponíveis</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function menuBarra() {
            var bar = document.getElementById("myTopnav");
            if (bar.className === "topnav") {
                bar.className += " responsive";
            } else {
                bar.className = "topnav";
            }
        } 
		function confirmaRemover() {
			var rem = confirm("Você deseja remover?");
            if(rem) {
                return true;
            } else {
                return false;
            }
		}
	</script>    
</head>
<body>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="site_cliente.php">Recebimentos</a>
            <a href="atualizar_cliente.php">Dados Cliente</a> 
            <a href="../produto/formulario_produto.php">Cadastra Produtos</a>
            <a class="active"  href="#">Doações</a>
            <a href="carrinhoPro.php">Carrinho Produtos</a>
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
            <?php
            require '../produto/produto.php';

            $produto = new Produto();

            $count = $produto->contarProdUsuario($_SESSION['idUsuario']);
            if($count < 1) {
                echo "<h4>Nenhum registro no Banco de Dados.</h4>"; 
            } else { 
                echo "<h4>Total de produtos cadastrados: {$count}</h4><br>";
                foreach($produto->listarProdUsuario($_SESSION['idUsuario']) as $value) {
                    echo "
                    <center><h4>{$value['nomeProduto']}</h4>
                    <p>{$value['descricaoProduto']}</p>
                    <p>{$value['nomeCategoria']}</p>    
                    <p><a href='../produto/atualizar_produto.php?id=" . $value["idProduto"] . "'>Editar</a> |              
                    <a onclick='return confirmaRemover();' href='../produto/remover_produto.php?id=" . $value["idProduto"] . "'>Remover</a></p>
                    </center><br>
                    ";
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
