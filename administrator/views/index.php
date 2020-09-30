<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$consulta = mysql_query("SELECT * FROM tb_geral");
$campo = mysql_fetch_array($consulta);

if(isset ($_GET['edit'])){ // caso  seja passado o id via GET edita 
$crud = new crud('tb_geral'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_webmail='$_POST[tx_webmail]'"); // ,tx_noticias='$_POST[tx_noticias]',tx_galeria='$_POST[tx_galeria]',tx_produtos='$_POST[tx_produtos]'

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link rel="stylesheet" type="text/css" href="../css/web4now.css" />
  <link rel="stylesheet" type="text/css" href="../css/buttonOnOff.css" />
  <script src="../js/RGraph.bar.js" ></script>
  <script>if(typeof window.orientation !== 'undefined'){
    document.write('<style>.box {width: 95%;}');}
    else{document.write('<style>.box {width: 50%;}');}
  </script>
  <style type="text/css">
    *{
      font-family: calibri;        
    }
    .box-chart {
      width: 100%;
    }
  </style>  

  <script type="text/javascript">var randomnb = function(){ return Math.round(Math.random()*5)};</script>  

  <?
  $ano = $_REQUEST['ano'];

  if(!$ano){$ano = date('Y');}

  $myQuery = "SELECT * FROM tb_webalizer WHERE tx_ano = '$ano'";
  $consultar = mysql_query($myQuery);  

  for($i=1;$i<=12;$i++)
  {       
    $resultado = mysql_fetch_array($consultar);
    if($resultado['tx_mes'] == $i){$mes[$i] = $resultado['tx_count'];}
    if($mes[$i] < 1){$mes[$i] = '0';}

  }

  $dadosMes = join(",", array($mes[1],$mes[2],$mes[3],$mes[4],$mes[5],$mes[6],$mes[7],$mes[8],$mes[9],$mes[10],$mes[11],$mes[12]));
  $dadosMes = "[$dadosMes]";

  echo "<script>" . "\n";
  echo "var dadosMes = $dadosMes" . "\n";
  echo "var jan = $mes[1];";
  echo "var fev = $mes[2];";
  echo "var mar = $mes[3];";
  echo "var abr = $mes[4];";
  echo "var mai = $mes[5];";
  echo "var jun = $mes[6];";
  echo "var jul = $mes[7];";
  echo "var ago = $mes[8];";
  echo "var set = $mes[9];";
  echo "var out = $mes[10];";
  echo "var nov = $mes[11];";
  echo "var dez = $mes[12];";
  echo "</script>"  . "\n";
  ?>          

  <script type="text/javascript">                                        

    var options = {
      responsive:true
    };

    var data = {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      datasets: [
      {
        label: "Semanal",
        fillColor: "rgba(220,220,220,0.5)",
        strokeColor: "rgba(220,220,220,0.8)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        data: [
        (jan/4).toFixed(0), (fev/4).toFixed(0),
        (mar/4).toFixed(0), (abr/4).toFixed(0),
        (mai/4).toFixed(0), (jun/4).toFixed(0),
        (jul/4).toFixed(0), (ago/4).toFixed(0),
        (set/4).toFixed(0), (out/4).toFixed(0),
        (nov/4).toFixed(0), (dez/4).toFixed(0)]
      },

      {
        label: "Mensal",
        fillColor: "rgba(151,187,205,0.5)",
        strokeColor: "rgba(151,187,205,0.8)",
        highlightFill: "rgba(151,187,205,0.75)",
        highlightStroke: "rgba(151,187,205,1)",
        data: [jan, fev, mar, abr, mai, jun, jul, ago, set, out, nov, dez]
      }
      ]
    };                

    window.onload = function(){
      var ctx = document.getElementById("GraficoBarra").getContext("2d");
      var BarChart = new Chart(ctx).Bar(data, options);
    }           
  </script>


  <title>Gerenciador de web4now</title>
</head>
<body>               
  <? 
  require_once '../includes/alert.php';
  require_once '../includes/menu.php';
  ?> 
  <form action="?edit=yes" method="post" target="sql">

    <div class="CSSTableGenerator" > 
      <table>
<?php
$banners = mysql_query("SELECT * FROM tb_banners WHERE tx_descricao = 'Popup' or tx_descricao = 'popup'");
$banner=mysql_num_rows($banners);
if($banner > 0){
?>
        <tr>
          <td class="backgroundCenter"><font color="#fff" align='center' size='2'><b>PopUP</b></font></td>
        </tr>           
        <tr>        
          <td >
            <div class="onoffswitch">
              <input  type="checkbox" name="tx_webmail" class="onoffswitch-checkbox" value="1"  id="amyonoffswitch" onChange="this.form.submit();" <?php if(@$campo['tx_webmail']){echo'checked';}  ?>>
              <label class="onoffswitch-label" for="amyonoffswitch" >
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>         
            </div>   
          </td>
        </tr>
<?}?>
<!--
<tr>
<td>
<b>Produtos</b>
<div class="onoffswitch">
<input type="checkbox" name="tx_produtos" class="onoffswitch-checkbox" value="1"  id="cmyonoffswitch" onChange="this.form.submit();" <?php if(@$campo['tx_produtos']){echo'checked';}  ?>>
<label class="onoffswitch-label" for="cmyonoffswitch">
<span class="onoffswitch-inner"></span>
<span class="onoffswitch-switch"></span>
</label>
</div>   
</td>
</tr>

<tr>
<td>
<b>Galeria</b>
<div class="onoffswitch">
<input type="checkbox" name="tx_galeria" class="onoffswitch-checkbox" value="1"  id="dmyonoffswitch" onChange="this.form.submit();" <?php if(@$campo['tx_galeria']){echo'checked';}  ?>>
<label class="onoffswitch-label" for="dmyonoffswitch">
<span class="onoffswitch-inner"></span>
<span class="onoffswitch-switch"></span>
</label>
</div>   
</td>
</tr>
-->
<tr>  
  <td class="backgroundCenter"><font color="#fff" size='2'><p align='center'><b>Visitas no Site</b></p></font></td>
</tr>
<tr>  
  <td>
    <div class="box">
      <div class="box-chart">        
        <canvas id="GraficoBarra" style="width:100%;"></canvas>
      </div>
    </div>        
  </td>
</tr>

</table>
</div>
</form>
</body>
</html>
<iframe width="0" height="0" tabindex="-1" name="sql" style="display:none">
  <?php $con->disconnect(); // fecha conexao com o banco ?>