<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$consulta = mysql_query("SELECT * FROM tb_config");
$campo = mysql_fetch_array($consulta);

$_POST[tx_nome]= utf8_decode($_POST[tx_nome]);
$_POST[tx_endereco]=utf8_decode($_POST[tx_endereco]);
$_POST[tx_bairro]=utf8_decode($_POST[tx_bairro]);
$_POST[tx_cidade]=utf8_decode($_POST[tx_cidade]);
$_POST[tx_estado]=utf8_decode($_POST[tx_estado]);
$_POST[tx_email]=utf8_decode($_POST[tx_email]);
$_POST[tx_telefone_1]=utf8_decode($_POST[tx_telefone_1]);
$_POST[tx_telefone_2]=utf8_decode($_POST[tx_telefone_2]);
$_POST[tx_keywords]=utf8_decode($_POST[tx_keywords]);
$_POST[tx_descricao]=utf8_decode($_POST[tx_descricao]);


if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
$crud = new crud('tb_config'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("
    tx_nome='$_POST[tx_nome]',
    tx_endereco='$_POST[tx_endereco]',
    tx_bairro='$_POST[tx_bairro]',
    tx_cidade='$_POST[tx_cidade]',
    tx_estado='$_POST[tx_estado]',
    tx_email='$_POST[tx_email]',
    tx_telefone_1='$_POST[tx_telefone_1]',
    tx_telefone_2='$_POST[tx_telefone_2]',
    tx_keywords='$_POST[tx_keywords]',
    tx_descricao='$_POST[tx_descricao]'
"); // utiliza a funçao ATUALIZAR da classe crud

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/web4now.css" />
    <title>Gerenciador web4now.com</title>
</head>
<body>
    <? 
    require_once '../includes/alert.php';
    require_once '../includes/menu.php';
    ?> 
    <form action="" method="post"><!--   formulario carrega a si mesmo com o action vazio  -->
        <input type="hidden" name="pag" value="config.php?" />

        <!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
        <div class="CSSTableGenerator" >  
            <table>
                <tr>
                    <td class="backgroundCenter">Dados da Empresa</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Nome da Empresa</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_nome" value="<?php echo utf8_encode(@$campo['tx_nome']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Endereço</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_endereco" value="<?php echo utf8_encode(@$campo['tx_endereco']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Bairro</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_bairro" value="<?php echo utf8_encode(@$campo['tx_bairro']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Cidade</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_cidade" value="<?php echo utf8_encode(@$campo['tx_cidade']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Estado</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_estado" value="<?php echo utf8_encode(@$campo['tx_estado']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Email</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_email" value="<?php echo utf8_encode(@$campo['tx_email']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Telefone</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_telefone_1" value="<?php echo utf8_encode(@$campo['tx_telefone_1']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Whatsapp / Celular</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_telefone_2" value="<?php echo utf8_encode(@$campo['tx_telefone_2']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Keywords</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_keywords" value="<?php echo utf8_encode(@$campo['tx_keywords']);  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Descrição</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_descricao" value="<?php echo utf8_encode(@$campo['tx_descricao']);  ?>" /></td>
                </tr>
            </table>
        </div>
        <?php
if(@!$campo['tx_id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
    ?>
    <br><input class="but but-success but-shadow but-rc" type="submit" name="editar" value="Editar" />
    <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
    <br><input class="but but-primary but-shadow but-rc" type="submit" name="editar" value="Editar" />&nbsp; 
    <?php } ?>
    <br><br>
</form>        
</body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>