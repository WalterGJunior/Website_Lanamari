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
  <form method="GET" action="">
    <label for="consulta">Buscar:</label>
    <input type="text" id="consulta" name="consulta" style="width:50%" /> <input class="but but-success but-shadow but-rc" type="submit" value="OK" />
  </form> 
  <div class="CSSTableGenerator" > 
    <table width="100%">
      <tr class="backgroundCenter">
        <td>
          Categoria
        </td>
        <td>
          Produtos
        </td>
        <td>

        </td>
      </tr>
      <?php
// Salva o que foi buscado em uma variável
      $busca = mysql_real_escape_string($_GET['consulta']);

// Registros por página
      $por_pagina = 10;


// Monta a consulta MySQL para saber quantos registros serão encontrados
      $condicoes = "((`tx_nome` LIKE '%{$busca}%') OR ('%{$busca}%'))";
      $sql = "SELECT COUNT(*) AS total FROM `tb_produtos` WHERE {$condicoes}";
// Executa a consulta
      $query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
      $total = mysql_result($query, 0, 'total');
// Calcula o máximo de paginas
      $paginas =  (($total % $por_pagina) > 0) ? (int)($total / $por_pagina) + 1 : ($total / $por_pagina);


// ============================================

      if (isset($_GET['pagina'])) {
        $pagina = (int)$_GET['pagina'];
      } else {
        $pagina = 1;
      }
      $pagina = max(min($paginas, $pagina), 1);
      $offset = ($pagina - 1) * $por_pagina;

// ============================================

// Monta outra consulta MySQL, agora a que fará a busca com paginação
      $sql = "SELECT * FROM `tb_produtos` WHERE {$condicoes} ORDER BY `tx_categoria` DESC LIMIT {$offset}, {$por_pagina}";
// Executa a consulta
      $query = mysql_query($sql);

// ============================================

// Começa a exibição dos resultados




while($campo = mysql_fetch_array($query)){ // laço de repetiçao que vai trazer todos os resultados da consulta
  ?>
  <tr class="backgroundCenter">
    <td>
      <?php echo utf8_encode(@$campo['tx_categoria']); // mostrando o campo NOME da tabela ?>
    </td>
    <td>
      <?php echo utf8_encode(@$campo['tx_nome']); // mostrando o campo NOME da tabela ?>
    </td>
    <td style="text-align:center">

      <a href="produtos_list.php?deleteReg=yes&pag=produtos_list.php?&tx_id=<?php echo $campo['tx_id']; // mostrando o campo NOME da tabela ?>"><input  style="width:50px; padding: 5px 5px;" class="but but-error but-shadow but-rc" type="button" name="excluir" value="Excluir" /> </a> 

      <a href="produtos.php?tx_id=<?php echo $campo['tx_id']; // mostrando o campo NOME da tabela ?>"> <input  style="width:50px; padding: 5px 5px;" class="but but-primary but-shadow but-rc" type="button" name="editar" value="Editar" /></a>
    </td>
  </tr>
  <?php } ?>
</table>
</div>
<br>
<?
// Links de paginação
// Começa a exibição dos paginadores
$pag  = ($pagina+1);
$pag_ = ($pagina-1);

if($pag <= 1){$pag  = 2;}

if($pagina > 1){echo "  <input class=\"but but-success but-shadow but-rc\" style=\"width:30px; padding: 5px 10px;\" type=\"button\" onclick=\"window.location='?consulta={$_GET['consulta']}&pagina=$pag_'\" value=\"<<\" />  ";}

if ($total > 0) {
  for ($n = 1; $n <= $paginas; $n++) {
    echo "  <input class=\"but but-success but-shadow but-rc\" style=\"width:30px; padding: 5px 10px;\" type=\"button\" onclick=\"window.location='?consulta={$_GET['consulta']}&pagina={$n}'\" value=\"{$n}\" />  ";
  }
  if($total > 2){echo "  <input class=\"but but-success but-shadow but-rc\" style=\"width:30px; padding: 5px 10px;\" type=\"button\" onclick=\"window.location='?consulta={$_GET['consulta']}&pagina=$pag'\" value=\">>\" />  ";}

  if($_GET['consulta']){echo "  <input class=\"but but-primary but-shadow but-rc\" type=\"button\" style=\"width:30px; padding: 5px 5px;\"onclick=\"window.location='?all'\" value=\"All\" />  ";}
}

?>
<br>
<br><? if($_GET['consulta']) {echo "Resultados ".min($total, ($offset + 1))." - ".min($total, ($offset + $por_pagina))." de ".$total." resultados encontrados para '".$_GET['consulta']."'"; }else{echo "Resultados ".min($total, ($offset + 1))." - ".min($total, ($offset + $por_pagina))." de ".$total."";} ?>
</body>
</html>
<?php
if(($_GET[delete])&&($_GET[tx_id]))
{

  try{
//Caminho real da pasta e extensão desejada
    $path = "../../produtos/$_GET[tx_id]/*.*";
    array_map( "unlink", glob( $path ) ); 
  } catch (Exception $ex) {
    die("Erro : {$ex -> getMessage()}");
  }

  $linkImg = '../../produtos/'.$_GET['tx_id'];
  $rmdir   = rmdir($linkImg);

  require_once '../class/conexao.class.php';
  require_once '../class/crud.class.php';

$con = new conexao();  // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$crud = new crud('tb_produtos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$tx_id = $_GET['tx_id']; //pega id para exclusao caso exista

$crud->excluir("tx_id = $tx_id"); // exclui o registro com o id que foi passado

$con->disconnect(); // fecha a conexao
}
?>
<?php $con->disconnect(); // fecha conexao com o banco ?>      
