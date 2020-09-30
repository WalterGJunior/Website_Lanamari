<?php
  //1 – Definimos Para quem vai ser enviado o email
  $para = "whiltonreis@gmail.com";
  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = 'Pedido para cadastro de NewsLetter';
  $email = $_POST['email'];
  //$fone = $_POST['phone'];
  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = 'NewsLetter';
   //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem = "".$nome;
  $mensagem .= "<br><strong>Email:  </strong>".$email;

//5 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  myhouseplan.com.br<site@myhouseplan.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <site@myhouseplan.com.br>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <site@myhouseplan.com.br>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";

$sucess = mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.

if($sucess){
echo"<font size='4' face='Corbel' color='#fff'><p align='center'>Email enviado com sucesso!</p></font>";
}
  ?>