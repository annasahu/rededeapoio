<?php 
include('login.php'); 
require 'itemPro.php';///ACRESCENTEI!
?>
<html>
<head>
    <title>Acesso ao Sistema</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="w3-container w3-black">
		<h2>Login dos Usuários</h2>
	</div><br>
    <div class="w3-container">
    <form method="POST" action="">
        <p><label>E-mail do usuário:</label><br>
        <input class="w3-input w3-border" style="width:40%" type="email" name="emailUsuario" required></p><br>
        <p><label>Senha:</label><br>
        <input class="w3-input w3-border" style="width:40%" type="password" name="senhaUsuario" required></p>
        <br>
        <p><strong><?php echo $error; ?></strong></p>
        <br>        
        <input class="w3-btn w3-black w3-round" type="submit" name="submit" value="Acessar">        
        <button class="w3-btn w3-black w3-round" style="margin-left:25px;" onclick="window.location.href='usuario/formulario_usuario.html'">Cadastrar</button></a> 
        <button class="w3-btn w3-black w3-round" style="margin-left:25px;" onclick="window.location.href='index.html'">Voltar</button></a>  
    </form>
    
    </div>
</body>
