<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
?>
<?php if(isset($_POST['campo'])) {


    $formulario.="
     <div style='height:10px'></div>
      <div style='width:60%'>
        <form name=\"frmcontato\" action=\"\" method=\"post\" id=\"ajax_form\">";

// Faz loop pelo array dos campos:
            foreach($_POST['campo'] as $k => $campo) {

                //$campo = utf8_decode($campo);

                $nome_arquivo  = strtr($campo , 'áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ', 'aaaaeeiooouucAAAAEEIOOOUUC_');


                $formulario.="<div class=\"form-group\">
                                <label for=\"campo[$nome_arquivo]\">$campo</label>
                                <input type=\"text\" class=\"form-control\" id=\"campo[$nome_arquivo]\" name='campo[$nome_arquivo]' placeholder=\"Name\" $_POST[$k]>
                            </div>";                           
            }

            $formulario.="<button type=\"submit\" name='send' value='true' class=\"btn red btn-lg\">Enviar</button></form><div style='height:30px'></div></div>";

            $_POST['tx_titulo'] = utf8_decode($_POST['tx_titulo']);
            $_POST['tx_form']   = base64_encode($formulario);

$crud = new crud('tb_formularios');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_titulo,tx_form","'$_POST[tx_titulo]','$_POST[tx_form]'");

}
else
{
    print "<script>window.location='forms.php?warnings=alert_forms'</script>";
}
?>
<?php $con->disconnect(); // fecha conexao com o banco ?>
