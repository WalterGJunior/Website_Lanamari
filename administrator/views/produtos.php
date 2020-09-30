<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';    

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
@$getId = $_GET['tx_id'];  //pega id para ediçao caso exista
if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
    $consulta = mysql_query("SELECT * FROM tb_produtos WHERE tx_id = + $getId");
    $campo = mysql_fetch_array($consulta);
}
else
{
    $consultaId = mysql_query("SELECT * FROM tb_produtos ORDER By tx_id DESC");
    $campoId = mysql_fetch_array($consultaId); 
    $newId =   ($campoId['tx_id']+1);
}


if(isset($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 

    require_once '../class/class.newupload.php';

    $_POST['tx_nome'] = utf8_decode($_POST['tx_nome']);
$crud = new crud('tb_produtos');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_id,tx_nome,tx_categoria,tx_sub_categoria,tx_img,tx_descricao","'$_POST[tx_id]','$_POST[tx_nome]','$_POST[tx_categoria]','$_POST[tx_sub_categoria]','$_POST[tx_id]','$_POST[tx_descricao]'"); // utiliza a funçao INSERIR da classe crud        

}    
if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 

    require_once '../class/class.newupload.php';

    $_POST['tx_nome'] = utf8_decode($_POST['tx_nome']);

$crud = new crud('tb_produtos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_id='$_POST[tx_id]',tx_nome='$_POST[tx_nome]',tx_categoria='$_POST[tx_categoria]',tx_sub_categoria='$_POST[tx_sub_categoria]',tx_descricao='$_POST[tx_descricao]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/web4now.css" />

    <script type="text/javascript">
        var qtdeCampos = 0;

        function addCampos() {
            var objPai = document.getElementById("campoPai");
//Criando o elemento DIV;
var objFilho = document.createElement("div");
//Definindo atributos ao objFilho:
objFilho.setAttribute("id","filho"+qtdeCampos);

//Inserindo o elemento no pai:
objPai.appendChild(objFilho);
//Escrevendo algo no filho recém-criado:
document.getElementById("filho"+qtdeCampos).innerHTML = "<input type='file' size='32' name='my_field[]' value='' /><br><br>";
qtdeCampos++;
}

function removerCampo(id) {
    var objPai = document.getElementById("campoPai");
    var objFilho = document.getElementById("filho"+id);

//Removendo o DIV com id específico do nó-pai:
var removido = objPai.removeChild(objFilho);
}
</script>


<title>Gerenciador web4now.com</title>
</head>
<body>
    <? 
require_once '../includes/alert.php'; //  Trata as requizições e emite alerta  -->
require_once '../includes/menu.php'; //  inclui o menu  -->
?>        
<form action="" method="post" enctype="multipart/form-data"><!--   formulario carrega a si mesmo com o action vazio  -->
    <input type="hidden" name="pag" value="produtos_list.php?tx_id=<?php echo @$getId; ?>&" /><!--   identifica a pagina de requisição para o crud  -->

    <!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
    <div class="CSSTableGenerator" >  
        <table>
            <tr>
                <td class="backgroundCenter">Produto</td>
                <td></td>
            </tr>
            <tr>
                <td class="backgroundCenter">Imagem</td>
                <td id="campoPai">
                    <?php 

                    $path = "../../produtos/$getId/"; $diretorio = dir($path); 

                    while($arquivo = $diretorio -> read()){ 

                        if ($arquivo!= "." and $arquivo != "..") { 

                            echo "<input class='but but-error but-shadow but-rc' type='button' name='X' value='X' style=\"width:20px; padding: 4px 4px;\" onclick=\"window.location='?deleteFoto=yes&id=$getId&arquivo=$arquivo&tx_id=$getId'\"/>  <img src='../../produtos/$getId/$arquivo' width='70px'> "; 

                        }
                    } $diretorio -> close(); 

                    ?> 
                    <hr style='border-top: 1px dashed #c0c0c0; ;border-right: 1px solid #fff; border-left: 1px solid #fff ;height: 4px;color: #fff;'>
                    <br><br><input type='file' size='32' name='my_field[]' value='' /><br><br></td>
                    <input type="hidden" name="action" value="multiple" />
                    <input type="hidden" name="tx_id" value="<?php if(@$getId){echo @$getId;}else{echo @$newId;} ?>" />                     
                </tr>
                <tr>
                    <td class="backgroundCenter">Nome do Produto</td>
                    <td><input class="campoHidden" required type="text" size="40%"  name="tx_nome" value="<?php echo @$campo['tx_nome'];  ?>" /></td>
                </tr>
                <tr>
                    <td class="backgroundCenter">Categoria</td>
                    <td>
                        <select  class="campoHidden" required  name="tx_categoria">
                            <?if(@$campo['tx_categoria']){?><option value="<?php echo utf8_encode(@$campo['tx_categoria']);  ?>"><?php echo utf8_encode(@$campo['tx_categoria']);  ?></option><?}?>
                            <option>Selecione</option>
                            <option value="Implementos">Implementos</option>
                            <option value="Pecas">Peças</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <tr>
                        <td class="backgroundCenter">Sub-Categoria</td>
                        <td>
                            <select  class="campoHidden" required  name="tx_sub_categoria">
                                <?if(@$campo['tx_sub_categoria']){?><option value="<?php echo utf8_encode(@$campo['tx_sub_categoria']);  ?>"><?php echo utf8_encode(@$campo['tx_sub_categoria']);  ?></option><?}?>
                                <option>Selecione</option>
                                <option value="Novo">Novo</option>
                                <option value="Usado">Usado</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="backgroundCenter">Descrição</td>
                        <td><textarea rows="5" name="tx_descricao"><?php echo @$campo['tx_descricao'];  ?></textarea></td>
                    </tr>       
                </table>
            </div>
            <?php
if(@!$campo['tx_id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
    ?>
    <br><input  class="but but-success  but-shadow but-rc" type="button" value="+ Foto" onclick="addCampos()">   <input class="but but-primary but-shadow but-rc" type="submit" name="cadastrar" value="Cadastrar" />
    <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
    <br><input  class="but but-success but-shadow but-rc" type="button" value="+ Foto" onclick="addCampos()">    <input class="but but-primary but-shadow but-rc" type="submit" name="editar" value="Editar" />&nbsp; 
    <?php } ?>
    <br><br>
</form>        
</body>
</html>
<?
if($_GET['deleteFoto'])
{
    $arq = "../../produtos/$_GET[id]/$_GET[arquivo]";
    if(unlink($arq))
    {
        echo"<script>window.location='?tx_id=$_GET[id]'</script>";
    }
}
?>
<?php $con->disconnect(); // fecha conexao com o banco ?>