<?php
require_once '../class/conexao.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

$estado = $_GET['estado'];
$sql = "SELECT * FROM tb_cidades WHERE tx_est_id = $estado ORDER BY tx_cid_nome";
$res = mysql_query($sql);
$num = mysql_num_rows($res);
for ($i = 0; $i < $num; $i++) {
  $dados = mysql_fetch_array($res);
  $arrCidades[$dados['tx_cid_id']] = utf8_encode($dados['tx_cid_nome']);
}
?>
<select name="cidade" id="cidade"  style="font-size:12px"  class="input">
  <?php foreach($arrCidades as $value => $nome){
   echo "<option value='{$value}'>{$nome}</option>";
  }
?>
</select>
