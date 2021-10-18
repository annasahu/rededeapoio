<?php 
include ("../conexao.php");
include ("usuario.php");

if(isset($_POST['submit'])) {
    $idUsuario = $_POST['idUsuario'];
    $nomeUsuario = $_POST['nomeUsuario'];
    $logradouroUsuario = $_POST['logradouroUsuario'];
    $cepUsuario = $_POST['cepUsuario']; 
    $cidadeUsuario = $_POST['cidadeUsuario']; 
    $estadoUsuario = $_POST['estadoUsuario']; 
    $telefoneUsuario = $_POST['telefoneUsuario'];    

    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
	$usuario = new Usuario();
    $status = $usuario->atualizar($nomeUsuario,$logradouroUsuario,$cepUsuario,$cidadeUsuario,$estadoUsuario,$telefoneUsuario,$idUsuario);
    if (!$status) {
		echo "<h4>Erro no cadastro! Tente novamente.</h4>";
	} else {
		header('location: atualizar_cliente.php');
		exit;
	} 
	$conexao->close();
}
?> 
