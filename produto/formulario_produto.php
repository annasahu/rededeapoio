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
	</script>  
</head>
<body>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="../usuario/site_cliente.php">Recebido</a>
            <a href="../usuario/atualizar_cliente.php">Dados Cliente</a>
            <a class="active"  href="#">Cadastro Produto</a>
            <a href="../usuario/site_produtos_cliente.php">Doado</a>
            <a href="../usuario/carrinhoPro.php">Carrinho</a>
            <a href="../sair.php">Sair</a>
            <a href="javascript:void(0);" class="icon" onclick="menuBarra()">
                <i class="fa fa-bars"></i>
            </a>
        </div> 
    </nav>    
    <section>
        <div class="margin">
        <br><h3>Cadastro de produto:</h3><br>
            <form method="POST" action="../produto/cadastro_produto.php">
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
