<?php
  //1 – Definimos Para quem vai ser enviado o email
  $para = "email";
  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = $_POST['name'];
  $email = $_POST['email'];
  $check = $_POST['check'];

  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = 'E-mail do Site';
   //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem = "<strong>Nome:  </strong>".$nome;
  $mensagem .= "<br><strong>Email:  </strong>".$email;
  $mensagem .= "<br><strong>Quer ser parceiro?:</strong>".$check;
  $mensagem .= "<br>  <strong>Mensagem: </strong>".$_POST['message'];

//5 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  site<site@site>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <site@site>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <site@site>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";

$sucess = mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.

if($sucess){
echo"<font size='4' face='Corbel' color='#ff0000'><p align='center'>Mensagem enviada com sucesso!</p></font>";
}
  ?>