<?php
session_cache_expire(15);
session_start();
require '../usuario/usuario.php';

if(!isset($_SESSION['login_user'])){
    header("Location: ../entrar.php");
}

$cliente = new Usuario();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gerenciamento: Clientes</title>
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
            <a href="#" class="active">Clientes</a>
            <a href="gerenciar_produtos.php">Produtos</a>            
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
        <h2>Lista de Clientes: </h2>
        <?php
        $count = $cliente->contar_clientes();
        if($count < 1) {
            echo "<h4>Nenhum registro no Banco de Dados.</h4>"; 
        } else { 
            echo "<h4>Foi(ram) encontrado(s) {$count} cliente(s) cadastrado(s).</h4>";
            foreach($cliente->listar_clientes() as $value) {
                echo "Id: {$value['idUsuario']}<br>";
                echo "Nome completo: {$value['nomeUsuario']};<br>CPF: {$value['documentoUsuario']};<br>Logradouro: {$value['logradouroUsuario']};<br>
                CEP: {$value['cepUsuario']};<br>Cidade: {$value['cidadeUsuario']};<br>Estado: {$value['estadoUsuario']};<br>
                Telefone: {$value['telefoneUsuario']};<br>E-mail: {$value['emailUsuario']};<br>";
                echo "<a onclick='return confirmaRemover();' href='remover_usuario.php?id=" . $value["idUsuario"] . "'>Remover</a><br><br>";
            }
        }
        ?>
        </div>
    </section>
</body>
</html>
