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

    $sql = "SELECT idUsuario FROM usuarios WHERE idUsuario = {$_SESSION['idUsuario']}";
    if($result = $conexao->query($sql)) {    
        $obj = $result->fetch_object();
    ?> 
<html>
<head>
    <title>Formulario para Cadastro de Produto</title>
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
            <a href="../usuario/atualizar_cliente.php">Dados Cliente</a>            
            <div class="dropdown">
                <button class="dropbtn">Produto: Cadastro
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">                    
                    <a href="../usuario/carrinhoPro.php">Carrinho</a>
                    <a href="../usuario/site_produtos_cliente.php">Doado</a> 
                    <a href="../usuario/site_cliente.php">Recebido</a>
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
        <h3>Cadastro de produto:</h3><br>
            <form method="POST" action="../produto/cadastro_produto.php" enctype="multipart/form-data">
            <p hidden><input type="number" name="idUsuario" value="<?php echo $obj->idUsuario; ?>"></p>
                <label>Categoria:</label><br>
                    <select name="idCategoria">
                        <option value="#">Selecione</option>   
                        <option value="1">Acessórios</option> 
                        <option value="2">Bengalas</option>
                        <option value="3">Cadeira de Banho</option>
                        <option value="4">Cadeira de Rodas</option>	
                        <option value="5">Muletas</option>
                        <option value="6">Sapatos</option>        
                    </select>
                <br><br>
                <label>Nome do Produto:</label><br>
                <input type="text" name="nomeProduto" required>
                <br><br>
                <label>Quantidade do Produto:</label><br>
                <input type="number" name="quantidadeProduto" required>
                <br><br>
                <label>Descrição do Produto:</label><br>
                <textarea name="descricaoProduto" rows="10" cols="50" required></textarea>        
                <br><br>
                <label>Selecione a imagem a ser enviada:</label>
                <br><br>
                <input type="file" name="file">
                <br><br><br>
                <input type="submit" name="submit" value="Cadastrar">
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
