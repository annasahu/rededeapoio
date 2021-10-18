<html>
<head>
    <title>Produtos buscados</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">  
    <link rel="stylesheet" type="text/css" href="css/w3.css">  
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
	</script>
</head>
<body>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.html">HOME</a>
            <a href="entrar.php">LOGIN</a>
            <a class="active" href="#">BUSCA</a>
            <a href="carrinhoPro.php">CARRINHO PRODUTOS</a>
            <a href="javascript:void(0);" class="icon" onclick="menuBarra()">
                <i class="fa fa-bars"></i>
            </a>
        </div> 
    </nav>
    <section>
        <div class="margin">  
        <?php
        include("conexao.php"); 
        include("produto/produto.php");   

        if(isset($_POST['submit'])){        
            $searchterm = trim($_POST['searchterm']);        
            echo "<br>";
            echo "<p><h4>Resultados para o termo: <b>" . $searchterm . "</b></h4></p>";        

            $produto = new Produto();            
            $num_results = $produto->contarProdBuscados($searchterm);            

            echo "<h6>Foram encontrados <b>" . $num_results . "</b> produtos.</h6>";   
            echo "<br>";
            foreach($produto->buscarProduto($searchterm) as $value) {
                echo "
                <center><h4>{$value['nomeProduto']}</h4>
                <p>{$value['descricaoProduto']}</p>
                <p>{$value['nomeCategoria']}</p>                 
                <a href='carrinhoPro.php?idPro={$value['idProduto']}'>Adicionar</a>
                </center><br>
                ";
            }
        }
        ?>    
        </div>
    </section>
</body>
</html>