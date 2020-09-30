<style>
.arquivo_div
{
margin: 0px; 
padding: 0px; 
border: 0px; 
outline: 0px; 
font-size: 14px; 
vertical-align: baseline; 
width: 60px; 
float: left; 
color: rgb(0, 0, 0); 
font-family: Arial, Verdana, Georgia, sans-serif; 
font-style: normal; 
font-variant: normal; 
font-weight: normal; 
letter-spacing: normal; 
line-height: 19.600000381469727px; 
orphans: auto; 
text-align: start; 
text-indent: 0px; 
text-transform: none; 
white-space: normal; 
widows: auto; 
word-spacing: 0px; 
-webkit-text-stroke-width: 0px; 
background-position: initial initial;
background-repeat: initial initial;
}
.arquivo_link
{
margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; color:#777777; text-decoration: none;
}
.imagem_arquivo
{
margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background-color: transparent; background-position: initial initial; background-repeat: initial initial;
}
.arquivo_nome
{
margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; float: left; color: rgb(0, 0, 0); font-family: Arial, Verdana, Georgia, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.600000381469727px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-position: initial initial; background-repeat: initial initial;
}
.arquivo_hr
{
margin: 10px 0px; padding: 0px; border-width: 0px 0px 1px; border-bottom-style: dashed; border-bottom-color:#C0C0C0; outline: 0px; font-size: 14px; vertical-align: baseline; clear: both; display: block; height: 1px; width: 620px; color: rgb(0, 0, 0); font-family: Arial, Verdana, Georgia, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.600000381469727px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-position: initial initial; background-repeat: initial initial;
}
</style>
<h2 class="un_servicos"><?php if(($_REQUEST['v'] == 'Arquivos')&&($_REQUEST['pasta'] != '')){$pasta = base64_decode($_REQUEST[pasta]);$resenha_titulo = substr($pasta, 24);echo"$resenha_titulo";}elseif(($_REQUEST['v'] == 'Arquivos')&&($_REQUEST['pasta'] == '')){echo'Arquivos';} ?></h2>

<?php
function tamanho_arquivo($tamanhoarquivo) {
	$bytes = array('KB', 'MB', 'GB', 'TB');

	if($tamanhoarquivo <= 999) {
		$tamanhoarquivo = 1000;
	}

	for($i = 0; $tamanhoarquivo > 999; $i++) {
		$tamanhoarquivo /= 1024;
	}

	return round($tamanhoarquivo).$bytes[$i - 1];
}

$pasta = $_REQUEST[pasta];
if($_REQUEST[abrir] == '')
{
$path = "downloads/files/"; 
$diretorio = dir($path);
while($arquivo = $diretorio -> read()){
if ($arquivo != "." and $arquivo != "..") { 
$nome = htmlentities($arquivo);
$resenha_titulo = substr($arquivo, 24);
$handle = opendir("downloads/files/$arquivo");

$files = 0;

while (false !== ($file = readdir($handle)))
{ 
if ($file != "." && $file != ".." && !(is_dir($pasta . $file))) { 
  $files++;
} 
}

echo"
<div class=\"arquivo_div\"><a target=\"_self\" href='?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=".base64_encode($arquivo)."' class='arquivo_link'><img class='imagem_arquivo' src=\"imgsite/pasta.png\" width=\"49\" height=\"49\"></a></div>
<div class=\"arquivo_nome\">
<a target=\"_self\" href='?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=".base64_encode($arquivo)."' class='arquivo_link'>$nome</a><br><span>$files arquivo(s)</span><br>
&nbsp;</div>
<div class=\"arquivo_hr\">
&nbsp;</div>
";
}
} 
}
elseif($_REQUEST[abrir] != '')
{
echo"
( Arquivos )
<div id=\"resultempo\" style=\"float:right;\">
<div class=\"qtdpg\">Exibir <a href='?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$_REQUEST[pasta]&qtp=20&pag=1'>20</a>, <a href='?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$_REQUEST[pasta]&qtp=40&pag=1'>40</a>, <a href='?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$_REQUEST[pasta]&qtp=60&pag=1'>60</a>,  linhas por p&aacute;gina</div>
</div>
<br>
<br>
<br>
";
$pasta = base64_decode($_REQUEST['pasta']);

							$pag = $_REQUEST['pag'] ? $_REQUEST['pag'] : 1;
							
							$qtp = $_REQUEST[qtp];
							
                            if(!$qtp){$rpp = 10;}else{$rpp = $qtp;}

     						$inicio = $pag * $rpp - $rpp;

							$dir = "downloads/files/$pasta";

							$abrir = opendir($dir);

							$arquivos = array();



							while (false !== ($file = readdir($abrir))) {

							        if ($file <> "." && $file <> "..") {

							  if (!is_dir($file)){

							         $arquivos[] = $file;

							         rsort($arquivos);

							  }

							        }

							}

							if(empty($arquivos))

							echo "<p align='center'>Pasta Vazia</p>";

							else

							$total = count($arquivos);

							$paginas = ceil ($total/$rpp);

							for ($i = $inicio; $i < $inicio+$rpp && $i < $total; $i++) {
                            
							$file = "downloads/files/$pasta/$arquivos[$i]";
							$tamanho =  tamanho_arquivo(filesize($file));
							$extensao = substr($arquivos[$i], -3);
							$nome = htmlentities($arquivos[$i]);
							$pastah = htmlentities($pasta);
							$data = date("F d Y H:i:s.", filemtime($file));
                           

							$resenha_titulo = substr($arquivos[$i], 0, 90);
							if((strlen($resenha_titulo)) > 88){$resenha_titulo = "$resenha_titulo...";}

							$titulo = strtolower($resenha_titulo);
							$titulo = ucwords($titulo);
							
							$titulo = substr($titulo, 11);
							
							$arq = "downloads/files/$pastah/$nome";


echo"
<div class=\"arquivo_div\"><a target=\"_blank\" href='".$arq."' class='arquivo_link'><img class='imagem_arquivo' src=\"imgsite/filetype_$extensao.gif\" width=\"49\" height=\"49\"></a></div>
<div class=\"arquivo_nome\">
<a target=\"_blank\" href='".$arq."' class='arquivo_link'>$nome</a><br><span>$tamanho</span><br>
&nbsp;</div>
<div class=\"arquivo_hr\">
&nbsp;</div>
";
}
$pasta = base64_encode($pasta);

							if($_GET['pasta']){echo"<BR><input type='button' class='btn' value='Voltar' onclick='history.back()'> ";}

							if ($pag > 1) {

							        $anterior = $pag - 1;

							    print "<input type=button class=btn value='<' onclick='document.location=\"?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$pasta&qtp=$_REQUEST[qtp]&pag=$anterior\"'> ";

       

							}


							for($p=1; $p < $paginas+1; $p++){
							print "<input type=button class=btn value=\"$p\" onclick='document.location=\"?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$pasta&qtp=$_REQUEST[qtp]&pag=$p\"'>";
							}
					



							if ($pag < $paginas) {

							        $proxima = $pag + 1;

							   print " <input type=button class=btn value='>' onclick='document.location=\"?pagina=$_REQUEST[pagina]&Route=$_REQUEST[Route]&abrir=yes&pasta=$pasta&qtp=$_REQUEST[qtp]&pag=$proxima\"'>";

							}
}
echo utf8_encode("
<br>
<br>
<br>
<a href='http://get.adobe.com/br/reader/' target='_blank'><img src='imgsite/selo_pdf.gif'></a>
<font size=1.8><p>Para ler arquivos PDF, você precisa ter instalado o Adobe Acrobat reader no seu computador.<br>
Você pode baixar a última versão no site da Adobe.</p></font>
");
?>
