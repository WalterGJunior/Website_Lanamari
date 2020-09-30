<?php
//  WebAlizer

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

$mes = date('m');
//$mes = '10';
$ano = date('Y');
//$ano = '2016';

$tb_verifica = mysql_query("SELECT * FROM `tb_webalizer` WHERE `tx_ano` = '".$ano."'"); 
$verifica = mysql_num_rows($tb_verifica);


if($verifica == 0){
    for($i=1;$i<=12;$i++)
       {  
    mysql_query("INSERT INTO `tb_webalizer` (tx_count,tx_mes,tx_ano) VALUES ('1','$i','$ano')");
  }
}


$tb_ipa  = mysql_query("SELECT * FROM `tb_ip` WHERE `tx_ip` = '".get_client_ip_env()."' && `tx_mes_` = '$mes'"); 
$tb_ipb  = mysql_fetch_array($tb_ipa); // consulta SQL tabela ip
$tb_ipc  = mysql_num_rows($tb_ipa);    


if(!$tb_ipc)
{

$myQuery  = mysql_query("SELECT * FROM `tb_webalizer` WHERE `tx_mes` = '$mes' && `tx_ano` = '$ano'");
$myQuerv  = mysql_fetch_array($myQuery);
$myQuerx  = mysql_num_rows($myQuery);

if($myQuerx)
{
$count = ($myQuerv['tx_count']+1);
mysql_query("UPDATE `tb_webalizer` SET `tx_count` = '$count' WHERE `tx_mes` = '$mes'");
mysql_query("INSERT INTO `tb_ip` (tx_ip,tx_mes_) VALUES ('".get_client_ip_env()."','$mes')");
}
else
{
mysql_query("INSERT INTO `tb_webalizer` (tx_count,tx_mes,tx_ano) VALUES ('1','$mes','$ano')");
mysql_query("INSERT INTO `tb_ip` (tx_ip,tx_mes_) VALUES ('".get_client_ip_env()."','$mes')");
}

}
?>