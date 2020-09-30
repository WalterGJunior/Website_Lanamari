<?php
//Variaveis

require_once 'administrator/class/conexao.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $tb_config   = mysql_query("SELECT * FROM tb_config"); $tb_config   = mysql_fetch_array($tb_config); // consulta SQL tabela config


$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// -------------

// Compo E-mail
$logo    = 'http://'.$_SERVER['HTTP_HOST'].'/img/logo.png';
$caminho = 'http://'.$_SERVER['HTTP_HOST'].'/administrator/img';

$arquivo .= "<html>
<head>
<meta http-equiv='Content-Language' content='pt-br'>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<title>web4now</title>
</head>

<body>

<table bgcolor='#efefef' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' height='100%' style='color: rgb(51, 51, 51); font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; max-width: 600px; width: 600px;'>
	<tr>
		<td align='center' valign='middle' style='font-family: arial, sans-serif; margin: 0px;'>
		<table bgcolor='#ffffff' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' height='100%' style='margin: 0px auto; padding: 0px; border-radius: 3px; border: 1px solid rgb(226, 226, 226);'>
			<tr>
				<td style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;<table bgcolor='#ffffff' cellspacing='0' cellpadding='0' border='0' align='left' height='100%'>
					<tr>
						<td width='10' style='font-family: arial, sans-serif; margin: 0px;'>
						&nbsp;</td>
						<td valign='middle' style='font-family: arial, sans-serif; margin: 0px;'>
						<img src='$logo' width='150' border='0' alt='web4now' class='CToWUd' style='display: block;'></td>
						<td width='10' style='font-family: arial, sans-serif; margin: 0px;'>
						&nbsp;</td>
						<td valign='middle' style='font-family: arial, sans-serif; margin: 0px; font-size: 22px; font-weight: bold; color: rgb(255, 119, 0);'>
						Você recebeu uma mensagem!</td>
						<td width='10' style='font-family: arial, sans-serif; margin: 0px;'>
						&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td bgcolor='#ffffff' height='5' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor='#efefef' height='5' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center' valign='middle' style='font-family: arial, sans-serif; margin: 0px;'>
		<table bgcolor='#ffffff' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' height='100%' style='margin: 0px auto; padding: 0px; border-radius: 3px; border: 1px solid rgb(226, 226, 226);'>
			<tr>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
			</tr>
			<tr>
				<td width='10' style='font-family: arial, sans-serif; margin: 0px;'>
				&nbsp;</td>
				<td style='font-family: arial, sans-serif; margin: 0px;'>
				<table bgcolor='#ffffff' cellspacing='0' cellpadding='0' border='0' align='left' height='100%' width='100%'>
					<tr>
						<td style='font-family: arial, sans-serif; margin: 0px;'><b>Formulário enviado pelo site.</b></td>
					</tr>
					<tr>
						<td height='10' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
					</tr>
					<tr>
						<td style='font-family: arial, sans-serif; margin: 0px;'><span class='Apple-converted-space'>&nbsp;</span>";
						foreach($_POST['campo'] as $campo => $valor)
						{

						$arquivo .= "
						 <p><b>$campo:</b> $valor</p>";
						}
 

						$arquivo .= "<span class='Apple-converted-space'>&nbsp;</span></td>
					</tr>
					<tr>
						<td height='15' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
					</tr>
					<tr>
						<td height='5' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
					</tr>
					<tr>
						<td style='font-family: arial, sans-serif; margin: 0px; padding: 0.1em; white-space: nowrap;'>
						<a title='$nome' target='_blank' style='color: rgb(51, 136, 187); font-weight: bold; text-decoration: none;' href=''>
						$nome</a><p style='padding: 0px; margin: 5px 0px 0px; font-weight: bold; color: rgb(61, 61, 61);'>
						<a title='$email' target='_blank' style='color: rgb(51, 136, 187); font-weight: bold; text-decoration: none;' href=''>
						$email</a><p style='padding: 0px; margin: 5px 0px 0px; font-weight: bold; color: rgb(61, 61, 61);'></p>
						<p style='padding: 0px; margin: 5px 0px 0px; font-weight: bold; color: rgb(61, 61, 61);'>
						Enviado em: $data_envio - $hora_envio</td>
					</tr>
					<tr>
						<td height='5' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
					</tr>
					<tr>
						<td align='center' valign='middle' style='font-family: arial, sans-serif; margin: 0px;'>
						<table bgcolor='#ffffff' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' height='100%' style='margin: 0px auto; padding: 0px; border: 1px solid rgb(170, 187, 0);'>
							<tr>
								<td height='10' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
							</tr>
							<tr>
								<td align='center' style='font-family: Arial; margin: 0px; font-weight: bold; font-size: 22px; color: rgb(170, 187, 0);'>
								web4now.com</td>
							</tr>
							<tr>
								<td align='center' style='font-family: Arial; margin: 0px; font-size: 14px; color: rgb(121, 65, 148);'>
								Seu website sem complicação, planos a partir de
								<b>R$19,99</b> por mês.<br>
								Ligue: <b>(43) 3017-4932</b> ou pelo <b>E-mail:
								</b>contato@web4now.com</td>
							</tr>
							<tr>
								<td height='10' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				</td>
				<td width='10' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
				<td bgcolor='#ffffff' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor='#efefef' height='20' style='font-family: arial, sans-serif; margin: 0px;'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center' valign='middle' style='font-family: arial, sans-serif; margin: 0px;'>
		<table bgcolor='#efefef' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' height='100%' style='margin: 0px auto; padding: 0px;'>
			<tr>
				<td align='center' style='font-family: arial, sans-serif; margin: 0px;'>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</body>

</html>
";


// -------------------------

//enviar
	
	// emails para quem será enviado o formulário
	$destino = @$tb_config['tx_email'] ;
	$assunto = "Contato pelo Site";
	$web4now = 'noreply@web4now.com';

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Web4now.com <$web4now>';
	//$headers .= "Bcc: $EmailPadrao\r\n";


	session_start ();

	$idPg = $_SESSION['idPg'];

	if($chave == $chavec)
	{
	
	$enviaremail = mail($destino, $assunto, $arquivo, $headers);


	if($enviaremail){
	echo"<div class='success'>Formulário enviado com sucesso!</div>";
	} else {
	echo"<div class='error'>Erro ao enviar o formulário.</div>";
	}
}
else
{
echo"<div class='warning'>Informe o código de segurança corretamente!</div>";
}

$con->disconnect(); // fecha conexao com o banco 
?>
