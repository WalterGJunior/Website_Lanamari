<?php
//Variaveis

require_once '../class/conexao.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $tb_config   = mysql_query("SELECT * FROM tb_config"); $tb_config   = mysql_fetch_array($tb_config); // consulta SQL tabela config


$nome = $_POST['nome'];
$email = $_POST['endemail'];
$telefone = $_POST['telefone'];
$estado = $_POST['estad'];
$cidade = $_POST['cidade'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$chave  = $_POST['chave'];
$chavec = $_POST['chavec'];

if($chavec == $chave)
{

$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// -------------

// Compo E-mail
    $arquivo .= "E-mail enviado pelo website.";
    $arquivo .= "<hr noshade color=\"#C0C0C0\" align=\"left\" width=\"500\" size=\"1\">";
	$arquivo .= "
                  <p>Nome: $nome</p>
                  <p>E-mail: <b>$email</b></p>
                  <p>Telefone: <b>$telefone</b></p>
                  <p>Cidade: $cidade</p>
                  <p>Estado: $estado</p>
                  <p>Assunto: $assunto</p>
                  <p>Mensagem: $mensagem</p>
 	";
	$arquivo .= "
            <hr noshade color=\"#C0C0C0\" align=\"left\" width=\"500\" size=\"1\"><p>Este e-mail foi enviado em <b>$data_envio</b> &agrave;s <b>$hora_envio</b></p>

        <p><i><a href='http://www.web4now.com'>web4now.com</a></i></p>
";

// -------------------------

//enviar
	
	// emails para quem será enviado o formulário
	$destino = @$tb_config['tx_email'] ;
	$assunto = "Contato pelo Site";

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $nome <$email>";
	//$headers .= "Bcc: $EmailPadrao\r\n";
	
	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
	if($enviaremail){
	echo"<script>parent.window.location='../../?pagina=Contato&send=success#UP'</script>";
	} else {
	echo"<script>parent.window.location='../../?pagina=Contato&send=error#UP'</script>";
	}
}
else
{
echo"<script>parent.window.location='../../?pagina=Contato&send=error_cod#UP'</script>";
}
$con->disconnect(); // fecha conexao com o banco 
?>