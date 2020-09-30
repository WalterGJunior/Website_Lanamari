<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
@$getId = $_GET['tx_id'];  //pega id para ediçao caso exista
if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
    $consulta = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = + $getId");
    $campo = mysql_fetch_array($consulta);
}


if(isset($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 

    $limitConsulta = mysql_query("SELECT * FROM tb_paginas");
    $campoLimit = mysql_num_rows($limitConsulta);

    if($campoLimit <= 100)
    {
        $_POST['tx_titulo'] = utf8_decode($_POST['tx_titulo']);
        $_POST['tx_formulario_nome'] = utf8_decode($_POST['tx_formulario_nome']);
        $_POST['tx_downloads'] = utf8_decode($_POST['tx_downloads']);
$crud = new crud('tb_paginas');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_titulo,tx_conteudo,tx_formulario_id,tx_formulario_nome,tx_downloads","'$_POST[tx_titulo]','$_POST[tx_conteudo]','$_POST[tx_formulario_id]','$_POST[tx_formulario_nome]','$_POST[tx_downloads]'"); // utiliza a funçao INSERIR da classe crud        
}
else
{
    echo"<script>window.location='pages.php?warnings=alert_pages'</script>";
}
}    
if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 

    $_POST['tx_titulo'] = utf8_decode($_POST['tx_titulo']);
    $_POST['tx_formulario_nome'] = utf8_decode($_POST['tx_formulario_nome']);
    $_POST['tx_downloads'] = utf8_decode($_POST['tx_downloads']);

$crud = new crud('tb_paginas'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_titulo='$_POST[tx_titulo]',tx_conteudo='$_POST[tx_conteudo]',tx_formulario_id='$_POST[tx_formulario_id]',tx_formulario_nome='$_POST[tx_formulario_nome]',tx_downloads='$_POST[tx_downloads]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/web4now.css" />

    <!-- TinyMCE -->
    <script type="text/javascript" src="../includes/tinymce/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="../js/tinyMCE.js"></script>
    <!-- /TinyMCE -->

    <title>Gerenciador web4now.com</title>
</head>
<body>
    <? 
require_once '../includes/alert.php'; //  Trata as requizições e emite alerta  -->
require_once '../includes/menu.php'; //  inclui o menu  -->
?>        
<form action="" method="post"><!--   formulario carrega a si mesmo com o action vazio  -->
    <input type="hidden" name="pag" value="pages_list.php?tx_id=<?php echo @$getId; ?>&" /><!--   identifica a pagina de requisição para o crud  -->

    <!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
    <div class="CSSTableGenerator" >  
        <table>
            <tr>
                <td class="backgroundCenter">Páginas</td>
                <td></td>
            </tr>
            <tr>
                <td class="backgroundCenter">Titulo</td>
                <td><input class="campoHidden" required type="text" size="40%"  name="tx_titulo" value="<?php echo utf8_encode(@$campo['tx_titulo']);  ?>" /></td>
            </tr>
            <tr>
                <td class="backgroundCenter">Formulario</td>
                <td>
                    <?
                    $sql = "SELECT * FROM tb_formularios ORDER BY tx_id";
                    $res = mysql_query($sql);
                    $num = mysql_num_rows($res);
                    for ($i = 0; $i < $num; $i++) {
                        $dados = mysql_fetch_array($res);
                        $arrFormularios[$dados['tx_id']] = utf8_encode($dados['tx_titulo']);
                    }
                    ?>
                    <select name="tx_formulario_id" style="font-size:12px"  class="campo">
                        <?
                        if(!$campo[tx_formulario_id]){ echo""; }
                        else{echo "<option value='".$campo['tx_formulario_id']."'>".utf8_encode($campo['tx_formulario_nome'])."</option>";}         
                        ?>
                        <option value="">Nenhum</option>
                        <?php foreach($arrFormularios as $value => $nome){
                            echo "<option value='{$value}'>{$nome}</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="tx_formulario_nome" value="<?php echo $nome; ?>" />
                </td>
                </tr>
                <tr>
                <td class="backgroundCenter">Arquivos</td>
                <td>
                <select name="tx_downloads" style="font-size:12px"  class="campo">
                <?
                if(!$campo[tx_downloads]){ echo""; }
                else{echo "<option value='".$campo['tx_downloads']."'>".utf8_encode($campo['tx_downloads'])."</option>";}         
                ?>
                <option value="">Nenhum</option>
                <option value="TODOS">TODOS</option>
                <?php
                    // atribuição a variável $dir
                   $dir = new DirectoryIterator( '../../downloads/files/' );
                 
                   // atribui o valor de $dir para $file em loop 
                   foreach($dir as $file )
                   {
                     // verifica se o valor de $file é diferente de '.' ou '..'
                     // e é um diretório (isDir)
                     if (!$file->isDot() && $file->isDir())
                     {
                    // atribuição a variável $dname
                        $dname = $file->getFilename();
                 
                        // imprime o nome do diretório
                        echo "<option value='{$dname}'>{$dname}</option>";
                     }
                   }
                ?>
                </select>
            </tr>
        </table>
    </div>
    <br><div style="box-shadow: 3px 3px 1px #999;width:100%;" >
    <textarea  name="tx_conteudo" id="RecordDrawer18_Article_Input" style="width:100%; height:300px;"><?php echo @$campo['tx_conteudo'];  ?></textarea>
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