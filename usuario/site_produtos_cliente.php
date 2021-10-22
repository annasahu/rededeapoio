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
    <style>
        .row {float: left;text-decoration: none;}
        .column {color: black; font-size: 16px;}
        .centro {text-align: center;}
        .justificado {text-align: justify;}    
        @media (max-width:600px){.cent {width: 90%; margin: 5px;}.lat {width: 5%;}}
        @media (min-width:601px){.cent {width: 40%; margin: 15px;}.lat {width: 5%;}}
        @media (min-width:951px){.cent {width: 29.3%; margin: 15px;}.lat {width: 2%;}}
        @media (min-width:1201px){.cent {width: 21%; margin: 20px;}.lat {width: 2%;}}
    </style>
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
            <a href="site_cliente.php">Recebido</a>
            <a href="atualizar_cliente.php">Dados Cliente</a> 
            <a href="../produto/formulario_produto.php">Cadastro Produto</a>
            <a class="active"  href="#">Doado</a>
            <a href="carrinhoPro.php">Carrinho</a>
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
                    <div class='row lat'></div>
                    <div class='row cent'>
                        <div class='column centro'><p><b>{$value['nomeProduto']}</b></p></div>
                        <div class='column justificado'><p>{$value['descricaoProduto']}</p></div>
                        <div class='column centro'><p>{$value['nomeCategoria']}</p></div>
                        <div class='column centro'>  
                            <p><a href='../produto/atualizar_produto.php?id=" . $value["idProduto"] . "'>Editar</a> |              
                            <a onclick='return confirmaRemover();' href='../produto/remover_produto.php?id=" . $value["idProduto"] . "'>Remover</a></p>
                        </div>
                    </div>
                    <div class='row lat'></div>
                    ";
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
