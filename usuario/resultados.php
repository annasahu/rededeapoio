<?php
session_cache_expire(15);
session_start();

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}
?>
<html>
<head>
    <title>Produtos buscados</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/estilo2.css">  
    <link rel="stylesheet" type="text/css" href="css/w3.css">  
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
	</script>
</head>
<body>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="atualizar_cliente.php">Dados Cliente</a>            
            <div class="dropdown">
                <button class="dropbtn">Produto: Recebido
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../produto/formulario_produto.php">Cadastro</a>
                    <a href="carrinhoPro.php">Carrinho</a>
                    <a href="site_produtos_cliente.php">Doado</a> 
                    <form action="resultados.php" method="post">    
                        <input name="searchterm" type="text" style="margin-left: 5px; margin-bottom: 5px; width: 180px; height: 35px;" placeholder="Buscar por produtos..." />
                        <button type="submit" name="submit" style="position: relative; top: 10px;" value="Search" /><img src="../imagens/lupa.png" style="height: 30px;"></button>  
                    </form> 
                </div>
            </div>  
            <a href="../sair.php">Sair</a>    
            <a href="javascript:void(0);" class="icon" onclick="menuBarra()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </nav>
    <section>
        <div class="margin">  
        <?php
        include("../conexao.php"); 
        include("../produto/produto.php");   

        if(isset($_POST['submit'])){        
            $searchterm = trim($_POST['searchterm']);        
            echo "<br>";
            echo "<p><h3>Resultados para o termo: " . $searchterm . "</h3></p>";        

            $produto = new Produto();            
            $num_results = $produto->contarProdBuscados($searchterm);            

            echo "<h5>Foram encontrados " . $num_results . " produtos.</h5>";   
            echo "<br>";
            foreach($produto->buscarProduto($searchterm) as $value) {
                echo "
                <div class='row lat'></div>
                <div class='row cent'>
                    <div class='column centro'><img src='../imagens_produtos/{$value['imagemProduto']}' alt='Imagem de Produto' width='250' height='250'></div>
                    <div class='column centro'><p><b>{$value['nomeProduto']}</b></p></div>
                    <div class='column justificado'><p>{$value['descricaoProduto']}</p></div>
                    <div class='column centro'><p>{$value['nomeCategoria']}</p></div>            
                    <div class='column centro'><a href='carrinhoPro.php?idPro={$value['idProduto']}'>Adicionar</a></div>
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