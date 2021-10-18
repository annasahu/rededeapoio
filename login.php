<?php
session_start();
require 'conexao.php';
$error = '';

if (isset($_POST['submit'])) {
    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario']; 
    $senhaUsuario = hash('sha256', $senhaUsuario);     
    $consulta = "SELECT * FROM usuarios WHERE emailUsuario ='$emailUsuario' AND senhaUsuario ='$senhaUsuario' LIMIT 1"; 
    $resultado = $conexao->query($consulta);
    
    if (!$resultado) {
		die ("Erro de acesso à base de dados: " . $conexão->error);
    }
	if (empty($resultado->data_seek(0))) {
        $error = "Nome do usuário ou senha está inválido!";
    } else {   
        $row = mysqli_fetch_array($resultado);  
        $_SESSION['login_user'] = $row['nomeUsuario'];
        $_SESSION['idUsuario'] = $row['idUsuario'];            
		
		if ($row['tipoUsuario'] == "Administrador") {            
			header("Location: gerenciar/gerenciar_produtos.php");
        } else {
            header("Location: usuario/site_cliente.php");			
        }
	}		
	$resultado->close();
	$conexao->close();
}
?>
