<?php
if(isset($_POST['email'])) { 
    
    $email_to = "insecta75@yahoo.com.br";
    $email_subject = "Rede de Apoio: Contato";
 
    function died($error) {        
        echo "Erro: Problema com o formulário de submissão! ";
        echo "Os erros podem ser vistos abaixo.<br /><br />";
        echo $error."<br /><br />";
        echo "Volte e conserte os erros!.<br /><br />";
        die();
    }
  
    // Se falta algo no formulário
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comments'])) {
        died('Erro: Problema com o formulário de submissão!');       
    }
    
    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $comments = $_POST['comments']; 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'O endereço de email inserido não parece ser válido!<br />';
    } 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
    if(!preg_match($string_exp,$name)) {
        $error_message .= 'O nome inserido não parece ser válido!<br />';
    } 
    if(strlen($comments) < 2) {
        $error_message .= 'O comentário inserido não parece ser válido!<br />';
    }    
    if(strlen($error_message) > 0) {
        died($error_message);
    } 
    $email_message = "Detalhes do formulário abaixo.\n\n";
  
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Nome: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Assunto: ".clean_string($comments)."\n"; 

    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
?> 
<h4>Obrigado pela mensagem! Entraremos em contato em breve com você!</h4>
<br><br>
<a href="index.html">Voltar</a>
<?php 
}
?>