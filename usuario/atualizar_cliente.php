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

$sql = "SELECT * FROM usuarios WHERE idUsuario = {$_SESSION['idUsuario']}";
if($result = $conexao->query($sql)) {    
    $obj = $result->fetch_object();
?> 
<html>
<head>
    <title>Formulario para atualizar Cliente</title>
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
            <a class="active" href="#">Dados Cliente</a>            
            <div class="dropdown">
                <button class="dropbtn">Produto
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../produto/formulario_produto.php">Cadastro</a>
                    <a href="carrinhoPro.php">Carrinho</a>
                    <a href="site_produtos_cliente.php">Doado</a> 
                    <a href="site_cliente.php">Recebido</a>
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
        <div class="margin">
        <h3>Atualizar cliente:</h3>
            <form method="POST" action="atualizar_cli.php" enctype="multipart/form-data">
                <p hidden><input type="number" name="idUsuario" value="<?php echo $obj->idUsuario; ?>"></p>
                <label>Nome completo:</label><br>
                <input type="text" name="nomeUsuario" value="<?php echo $obj->nomeUsuario; ?>">
                <br><br>
                <label>Logradouro:</label><br>
                <input type="text" name="logradouroUsuario" value="<?php echo $obj->logradouroUsuario; ?>">
                <br><br>
                <label>CEP:</label><br>
                <input type="text" name="cepUsuario" value="<?php echo $obj->cepUsuario; ?>">
                <br><br>
                <label>Cidade:</label><br>
                <input type="text" name="cidadeUsuario" value="<?php echo $obj->cidadeUsuario; ?>">
                <br><br>
                <label>Estado:</label><br>
                <input type="text" name="estadoUsuario" value="<?php echo $obj->estadoUsuario; ?>">
                <br><br>
                <label>Telefone:</label><br>
                <input type="text" name="telefoneUsuario" value="<?php echo $obj->telefoneUsuario; ?>">
                <br><br>
                <input type="submit" name="submit" value="Editar">                
            </form>    
        <?php
            $result->free_result();
        } else {
            printf($conexao->error);
        }
        $conexao->close();  
        ?>
        </div>
    </section>
</body>
</html>
