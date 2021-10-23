<?php
require 'produto.php';
$produto = new Produto();

//Sobre a imagem a ser submetida
$targetDir = "../imagens_produtos/";//Diretorio armazenar imagens (rwx)
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','gif');
$statusMsg = '';

if(isset($_POST['submit']) && !empty($_FILES["file"]["name"])) {
      $nomeProduto = $_POST['nomeProduto'];
      $idCategoria = $_POST['idCategoria'];
      $descricaoProduto = $_POST['descricaoProduto'];
      $quantidadeProduto = $_POST['quantidadeProduto'];
      $idUsuario = $_POST['idUsuario'];

      if(in_array($fileType, $allowTypes)) {
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {   
                  $status = $produto->inserir($nomeProduto,$idCategoria,$descricaoProduto,$quantidadeProduto,$idUsuario,$fileName);
                  
                  if (!$status) {
                        $statusMsg = '<h4>Erro no cadastro! Tente novamente.</h4><br><br><a href="formulario_produto.php">Voltar</a>';
                  } else {
                        header('location: ../produto/formulario_produto.php');
                        exit;
                  }  
            } else {
                  $statusMsg = '<h4>Ocorreu um erro ao enviar os dados!</h4><br><br><a href="formulario_produto.php">Voltar</a>';
            }
      } else {
            $statusMsg = '<h4>Somente são permitidos arquivos nos formatos JPG, JPEG, PNG e GIF.</h4><br><br><a href="formulario_produto.php">Voltar</a>';
      }
} else {
      $statusMsg = '<h4>Selecione um arquivo para o envio!</h4><br><br><a href="formulario_produto.php">Voltar</a>';
}

// Mostra a mensagem de estado
echo $statusMsg;
?>
