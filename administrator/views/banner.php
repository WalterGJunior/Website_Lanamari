<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
@$getId = $_GET['tx_id'];  //pega id para ediçao caso exista
if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
	$consulta = mysql_query("SELECT * FROM tb_banners WHERE tx_id = + $getId");
	$campo = mysql_fetch_array($consulta);
}


if((isset($_POST['cadastrar']))&&(isset($_FILES['tx_img']))){  // caso nao seja passado o id via GET cadastra 

	$uploaddir = '../../banners/';
	$uploadfile = $uploaddir . basename(date('ymdhis').'.jpg');

	if (move_uploaded_file($_FILES['tx_img']['tmp_name'], $uploadfile)) {


		$_POST['tx_url'] = utf8_decode($_POST['tx_url']);
		$_POST['tx_img'] = utf8_decode(date('ymdhis').'.jpg');

$crud = new crud('tb_banners');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_url,tx_target,tx_img,tx_descricao","'$_POST[tx_url]','$_POST[tx_target]','$_POST[tx_img]','$_POST[tx_descricao]'"); // utiliza a funçao INSERIR da classe crud


} else {
	echo "<script>window.location='?error=yes'</script>";
}
}


if(isset($_POST['editar'])){  // caso nao seja passado o id via GET cadastra 

	$uploaddir = '../../banners/';
	$uploadfile = $uploaddir . basename($_POST['tx_img_n']);

	if (move_uploaded_file($_FILES['tx_img']['tmp_name'], $uploadfile)) {


		$_POST['tx_url'] = utf8_decode($_POST['tx_url']);
		$_POST['tx_img'] = utf8_decode($_POST['tx_img_n']);

$crud = new crud('tb_banners'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_url='$_POST[tx_url]',tx_target='$_POST[tx_target]',tx_img='$_POST[tx_img]',tx_descricao='$_POST[tx_descricao]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud

} if(isset($_POST['tx_img_n'])) {

	$_POST['tx_url'] = utf8_decode($_POST['tx_url']);
	$_POST['tx_img'] = utf8_decode($_POST['tx_img_n']);

$crud = new crud('tb_banners'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_url='$_POST[tx_url]',tx_target='$_POST[tx_target]',tx_img='$_POST[tx_img]',tx_descricao='$_POST[tx_descricao]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/web4now.css" />

	<!-- TinyMCE -->
	<script type="text/javascript" src="../includes/tinymce/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="../js/tinyMCE_Banner.js"></script>
	<script type="text/javascript">

		function PreviewImage() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("imagem").files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
		};

	</script>
	<!-- /TinyMCE -->

	<title>Gerenciador web4now.com</title>
</head>
<body>
	<? 
require_once '../includes/alert.php'; //  Trata as requizições e emite alerta  -->
require_once '../includes/menu.php'; //  inclui o menu  -->
?>        
<form action="" method="post" enctype="multipart/form-data"><!--   formulario carrega a si mesmo com o action vazio  -->
	<input type="hidden" name="pag" value="banner_list.php?tx_id=<?php echo @$getId; ?>&" /><!--   identifica a pagina de requisição para o crud  -->

	<!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
	<div class="CSSTableGenerator" >  
		<table>
			<tr>
				<td class="backgroundCenter">Banners</td>
				<td></td>
			</tr>
			<tr>
				<td class="backgroundCenter">Imagem</td>
				<td>
					<?php if(@$campo['tx_img']){?>
					<img src="../../banners/<?php echo utf8_encode(@$campo['tx_img']);  ?>" style='border:7px double silver; max-width:285px; width:95%'  id="uploadPreview">
					<? }else{ ?>
					<img src="../img/download.png" style='border:7px double silver; max-width:285px; width:90%'  id="uploadPreview">
					<? }?>
					<br><br>
					<div id="box" class="" style="max-width:290px; width:95%" >
						<span class="selInputFile">
							<label>Arquivo:</label>
							<div class="boxImpFil">
								<input type="text" id="fakeupload" class="fakeupload" name="fakeupload" style="width:95%">
								<input  class="realupload"  name="tx_img"  style="width:100%" type="file" onchange="PreviewImage();this.form.fakeupload.value = this.value;" id="imagem"><input name="tx_img_n" type="hidden" value="<?php echo utf8_encode(@$campo['tx_img']);  ?>"/>
							</div>
						</td>
					</tr>
					<tr>
						<td class="backgroundCenter">Tipo</td>
						<td><select class="campo" name="tx_descricao">
                        <?
                        if(!$campo[tx_descricao]){ echo"<option value=''>Selecione</option>"; }
                        else{echo "<option value='".$campo[tx_descricao]."'>".utf8_encode($campo[tx_descricao])."</option>";}         
                        ?>
                                                    <option value='Principal'>Principal</option>
                                                    <option value='Inativo'>Inativo</option>
                                                    <option value='Popup'>PopUp</option>
                                                    </select>
                                                </td>
					</tr>
					<tr>
						<td class="backgroundCenter">Url</td>
						<td><input class="campoHidden" required type="text" size="40%"  name="tx_url" value="<?php if(@$campo['tx_url']){echo utf8_encode(@$campo['tx_url']);}else{echo'#';}  ?>" /></td>
					</tr>
					<tr>
						<td class="backgroundCenter">Target</td>
						<td>
							<select  class="campoHidden" required  name="tx_target">
								<option value="_self">Mesma página</option>
								<option value="_blank">Nova página</option>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<?php
if(@!$campo['tx_id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
	?>
	<br><input class="but but-success but-shadow but-rc" type="submit" name="cadastrar" value="Cadastrar" />
	<?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
	<br><input class="but but-primary but-shadow but-rc" type="submit" name="editar" value="Editar" />&nbsp; 
	<?php } ?>
	<br><br>
</form>        
</body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>