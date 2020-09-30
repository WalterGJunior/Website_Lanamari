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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/web4now.css" />


  <title>Gerenciador web4now.com<</title>
</head>
<body>
  <? 
  require_once '../includes/alert.php';
  require_once '../includes/menu.php';
  ?> 
  <div style="box-shadow: 3px 3px 1px #999;width:100%;" >
    <iframe src='../includes/kcfinder_galeria/browse.php?&refresh=yes&lang=pt' style='width:100%;height:400px' scrolling="no" border="0" frameborder="0"></iframe>
  </div>
</body>
</html>