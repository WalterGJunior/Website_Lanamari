<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/web4now.css" />
    <title>Gerenciador web4now.com</title>
</head>
<body>
    <? 
    require_once '../includes/alert.php';
    require_once '../includes/menu.php';
    ?>  
    <div class="CSSTableGenerator" > 
        <table width="100%">
            <tr class="backgroundCenter">
                <td>
                    Ativo
                </td>
                <td>
                    Nome
                </td>
                <td>

                </td>
            </tr>
            <?php
$consulta = mysql_query("SELECT * FROM tb_depoimentos ORDER BY tx_id"); // query que busca todos os dados da tabela COBRANÇA
$total = mysql_num_rows($consulta); // query que retorna a quantidade de registros COBRANÇA
while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
    ?>
    <tr class="backgroundCenter">
        <td>
            <?php if(!$campo['tx_ativo']){echo'<p align=center><font size=4 color=#00ff00><b>V<b></font></p>';}else{echo'<p align=center><font size=4 color=#ff0000><b>X<b></font></p>';} // mostrando o campo NOME da tabela ?> 
        </td>
        <td>
            <?php echo utf8_encode($campo['tx_nome']); // mostrando o campo NOME da tabela ?> 
        </td>
        <td style="text-align:center">
<a href="testimonials.php?tx_id=<?php echo $campo['tx_id']; // mostrando o campo NOME da tabela ?>"> <input  style="width:55px; padding: 5px 5px;" class="but but-primary but-shadow but-rc" type="button" name="editar" value="Ver" /></a>
<a href="testimonials_list.php?updateReg=yes&pag=testimonials_list.php?&tx_id=<?php echo $campo['tx_id']; // mostrando o campo NOME da tabela ?>"> <input  style="width:55px; padding: 5px 5px;" class="but but-success but-shadow but-rc" type="button" name="editar" value="Aprovar" /></a>
            <? if(($campo[tx_id] > '0')){ ?>
            <a href="testimonials_list.php?deleteReg=yes&pag=testimonials_list.php?&tx_id=<?php echo $campo['tx_id']; // mostrando o campo NOME da tabela ?>"><input  style="width:55px; padding: 5px 5px;" class="but but-error but-shadow but-rc" type="button" name="excluir" value="Excluir" /> </a> 
            <?php }else{ ?>
            <input style="width:55px; padding: 5px 5px;" class="but but-silver but-shadow but-rc" type="button" name="excluir" value="Excluir" />
            <?php }?>            
            
        </td>
    </tr>
    <?php } ?>
</table>
</div>
<br>Total de Registros: <? echo $total ?>
</body>
</html>
<?php
if(($_GET[delete])&&($_GET[tx_id]))
{
    require_once '../class/conexao.class.php';
    require_once '../class/crud.class.php';



$con = new conexao();  // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$crud = new crud('tb_depoimentos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$tx_id = $_GET['tx_id']; //pega id para exclusao caso exista
$crud->excluir("tx_id = $tx_id"); // exclui o registro com o id que foi passado

$con->disconnect(); // fecha a conexao

echo"<script>window.location='?delete=success'</script>";
}

if(($_GET[updateReg])&&($_GET[tx_id]))
{
    require_once '../class/conexao.class.php';
    require_once '../class/crud.class.php';


$con = new conexao();  // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$crud = new crud('tb_depoimentos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$tx_id = $_GET['tx_id']; //pega id para exclusao caso exista
$crud->atualizar("tx_ativo='0'", "tx_id='$tx_id'");

$con->disconnect(); // fecha a conexao

echo"<script>window.location='?delete=success'</script>";
}

?>
<?php $con->disconnect(); // fecha conexao com o banco ?>      