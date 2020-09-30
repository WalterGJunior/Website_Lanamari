<?
require_once 'administrator/class/conexao.class.php';
require_once 'administrator/class/class.mydata.php';

$funcoes  = new myData();  // instancia classe de saudacao
$saudacao = $funcoes->myData();  // mostra data

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$tb_config   = mysql_query("SELECT * FROM tb_config"); 
$tb_config   = mysql_fetch_array($tb_config); // consulta SQL tabela config

$getId   = $_GET['id'];
$getTipo = $_GET['pagina'];

if(($getId)&&($getTipo != 'Formulario'))
{
$tb_paginas   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = + $getId"); 
$pagina       = mysql_fetch_array($tb_paginas);
}
elseif($getId)
{
$tb_paginas   = mysql_query("SELECT * FROM tb_formularios WHERE tx_id = + $getId"); 
$pagina       = mysql_fetch_array($tb_paginas);
} 

?>
<?
//webalizer
include('administrator/cont/cont.php');
?>