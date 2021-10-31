<?php
session_cache_expire(15);
session_start();

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}
?>
<html>
<head>
    <title>Site do Cliente</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/estilo2.css">  
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
            <?php echo "<h4>Seja bem vindo " . $_SESSION['login_user'] . "!</h4>"; ?>
        </div>
    </section>  
</body>
</html>
