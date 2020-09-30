<!-- INÍCIO CORPO DO SITE -->
<?php 

// Define uma lista com os arquivos que poderão ser chamados na URL
$permitidos = array('Home','V','Localizacao','Contato','Noticias','Ler','Galeria','SobreNos','Inscricao');

// Verifica se a variável $_GET['pagina'] existe E se ela faz parte da lista de arquivos permitidos
if (isset($_GET['pagina']) AND (array_search($_GET['pagina'], $permitidos) !== false)) {
// Pega o valor da variável $_GET['pagina']
$arquivo = $_GET['pagina'];
}
elseif(isset($_GET['id'])) {

session_start ();

$_SESSION["idPg"]   = $_GET['id'];

?>
<div class="active-yellow banner-wrapper">
    <div class="container">
        <h2 align='center'><?php echo @$pagina['tx_titulo'];?></h2>
    </div>
</div>

<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
 <?php echo @$pagina['tx_conteudo'];?>  
<?php
if(@$pagina['tx_formulario_id'])
{

  $tb_formularios  = mysql_query("SELECT * FROM tb_formularios WHERE tx_id = $pagina[tx_formulario_id]");    
  $form  = mysql_fetch_array($tb_formularios);

  include('administrator/layout/alert_email.tpl');

  echo "<br><hr noshade color=\"#C0C0C0\" align=\"left\" width=\"80%\" size=\"1\"><br>".base64_decode($form ['tx_form']);
}
?>        
</div>
<div class="col-md-3">
    <div class="sidebar">
        <ul class="nav nav-pills nav-stacked">
             <li><a href="#"><? echo utf8_decode(@$pagina['tx_titulo'])?></a></li>
             <li><a href="?pagina=Localizacao"><? echo utf8_decode('Localização')?></a></li>
             <li><a href="?pagina=Galeria">Galeria de Fotos</a></li> 
             <li><a href="?pagina=Noticias"><? echo utf8_decode('Notícias')?></a></li>                       
             <li><a href="?pagina=Contato">Contato</a></li>
             <?
               $pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id  > '14'  ORDER by tx_id ASC"); 
               while($pgLink=mysql_fetch_array($pgLinks))
               {
                 if($_GET['id'] == $pgLink[tx_id]){echo"<li class='active'>";}else{echo"<li>";}
                 echo"<a href=\"?id=$pgLink[tx_id]&bar=eWVsbG93\">$pgLink[tx_titulo]</a></li>";
               }
              ?>
        </ul>
    </div>
    <div class="sidebar">
        <h3>Galeria de Fotos</h3>
        <div class="ads clearfix">
            <?
            $path = "uploads/.thumbs/files/"; 
            $diretorio = dir($path);
            $albuns = 0;
            while($arquivo = $diretorio -> read()){
                if ($arquivo != "." and $arquivo != "..") { 
                    $handle = opendir("uploads/.thumbs/files/$arquivo");				

                    $files = 0;

                    while (false !== ($file = readdir($handle)))
                    { 
                        if ($file != "." && $file != ".." && !(is_dir($pasta . $file))) { 
                            $files++;
                        } 
                    }

                    if($albuns <7){
                        echo"<a href=\"?pagina=Galeria&pasta=".base64_encode($arquivo)."#UP\"><img src=\"uploads/.thumbs/files/".utf8_decode($arquivo)."/1.jpg\" style=\"width:81px; height:61px\" class=\"img-responsive\" alt=\"\"></a>

                        ";
                    }
                }
                $albuns++;
            }
            ?>
        </div>
    </div>
    <div class="sidebar">
        <h3>Depoimentos</h3>
        <div class="testi-slider clearfix">
            <ul class="slides">


                <? 
                $tb_paginas   = mysql_query("SELECT * FROM tb_depoimentos WHERE tx_ativo = '0'");    
                while($pagina= mysql_fetch_array($tb_paginas))
                { 
                    ?>
                    <li>
                        <img src="banners/<?echo @$pagina['tx_foto'];?>" alt="" width="60" class="img-circle">
                        <p>
                            <font size=2> <?echo @$pagina['tx_depoimento'];?> </font>
                        </p>
                        <h5><?echo @$pagina['tx_nome'];?></h5>
                    </li>
                    <?}?>                      


                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div style="height:10px"></div>
<?php
} else {
// Se não existir variável $_GET ou ela não estiver na lista de permissões, define um valor padrão
$arquivo = 'Home';
}
if ($arquivo){  
include ("administrator/pages/$arquivo.php"); // Inclui o arquivo
}
?>
<!-- FIM DO CORPO DO SITE -->