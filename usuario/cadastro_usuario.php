<?php
require 'usuario.php';
$usuario= new Usuario();

if(isset($_POST['submit'])){
    $nomeUsuario = $_POST['nomeUsuario'];
    $documentoUsuario = $_POST['documentoUsuario'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $cepUsuario = $_POST['cepUsuario'];
    $logradouroUsuario = $_POST['logradouroUsuario'];
    $cidadeUsuario = $_POST['cidadeUsuario'];
    $estadoUsuario = $_POST['estadoUsuario'];
    $telefoneUsuario = $_POST['telefoneUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];      
    $hashed_password = hash('sha256', $senhaUsuario);
    
    $status = $usuario->inserir($nomeUsuario,$documentoUsuario,$logradouroUsuario,$cepUsuario,$cidadeUsuario,$estadoUsuario,$telefoneUsuario,$emailUsuario,$hashed_password,$tipoUsuario);
    
  if (!$status) {
		echo "<h4>Erro no cadastro! Tente novamente.</h4>";
	} else {
    header('location: formulario_usuario.html');
		exit;
	}  
}
?>
