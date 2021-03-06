﻿<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
@$getId = $_GET['tx_id'];  //pega id para ediçao caso exista
if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
    $consulta = mysql_query("SELECT * FROM tb_produtos_sub_categoria WHERE tx_id = + $getId");
    $campo = mysql_fetch_array($consulta);
}


if(isset($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 

    $_POST['tx_sub_categoria_nome'] = utf8_decode($_POST['tx_sub_categoria_nome']);

$crud = new crud('tb_produtos_sub_categoria');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_sub_categoria_nome","'$_POST[tx_sub_categoria_nome]'"); // utiliza a funçao INSERIR da classe crud        

}
$_POST['tx_sub_categoria_nome'] = utf8_decode($_POST['tx_sub_categoria_nome']);

if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
$crud = new crud('tb_produtos_sub_categoria'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_sub_categoria_nome='$_POST[tx_sub_categoria_nome]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud

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
require_once '../includes/alert.php'; //  Trata as requizições e emite alerta  -->
require_once '../includes/menu.php'; //  inclui o menu  -->
?>        
<form action="" method="post"><!--   formulario carrega a si mesmo com o action vazio  -->
    <input type="hidden" name="pag" value="products_sub_category_list.php?tx_id=<?php echo @$getId; ?>&" /><!--   identifica a pagina de requisição para o crud  -->

    <!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
    <div class="CSSTableGenerator" >  
        <table>
            <tr>
                <td class="backgroundCenter">Sub-Categorias</td>
                <td></td>
            </tr>
            <tr>
                <td class="backgroundCenter">Nome da Sub-Categoria</td>
                <td><input class="campoHidden" required type="text" size="40%"  name="tx_sub_categoria_nome" value="<?php echo utf8_encode(@$campo['tx_sub_categoria_nome']);  ?>" /></td>
            </tr>
        </table>
    </div>
    <?php
if(@!$campo['tx_id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
    ?>
    <br><input class="but but-success but-shadow but-rc" type="submit" name="cadastrar" value="Cadastrar" />
    <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
    <br><input class="but but-primary but-shadow but-rc" type="submit" name="editar" value="Editar" />&nbsp; 
    <?php } ?>
    <br><br>
</form>        
</body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>