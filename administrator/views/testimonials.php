<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once '../class/conexao.class.php';
require_once '../class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
@$getId = $_GET['tx_id'];  //pega id para ediçao caso exista
if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
    $consulta = mysql_query("SELECT * FROM tb_depoimentos WHERE tx_id = + $getId");
    $campo = mysql_fetch_array($consulta);
}


if((isset($_POST['cadastrar']))&&(isset($_FILES['tx_img']))){  // caso nao seja passado o id via GET cadastra 

    $uploaddir = '../../banners/';
    $uploadfile = $uploaddir . basename($_FILES['tx_img']['name']);

    if (move_uploaded_file($_FILES['tx_img']['tmp_name'], $uploadfile)) {


        $_POST['tx_img'] = utf8_decode($_FILES['tx_img']['name']);
        $_POST['tx_depoimento'] = utf8_decode($_POST['tx_depoimento']);
        $_POST['tx_data'] = date('Y-m-d'); 

$crud = new crud('tb_depoimentos');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_nome,tx_foto,tx_depoimento,tx_data,tx_ativo","'$_POST[tx_nome]','$_POST[tx_img]','$_POST[tx_depoimento]','$_POST[tx_data]','1'"); // utiliza a funçao INSERIR da classe crud


} else {
    echo "<script>window.location='?error=yes'</script>";
}
}


if(isset($_POST['editar'])){  // caso nao seja passado o id via GET cadastra 

    $uploaddir = '../../banners/';
    $uploadfile = $uploaddir . basename($_POST['tx_img_n']);

    if (move_uploaded_file($_FILES['tx_img']['tmp_name'], $uploadfile)) {

        $_POST['tx_depoimento'] = utf8_decode($_POST['tx_depoimento']);
        $_POST['tx_img'] = utf8_decode($_POST['tx_img_n']);

$crud = new crud('tb_depoimentos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_nome='$_POST[tx_nome]',tx_foto='$_POST[tx_img]',tx_depoimento='$_POST[tx_depoimento]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud

} if(isset($_POST['tx_img_n'])) {

    $_POST['tx_depoimento'] = utf8_decode($_POST['tx_depoimento']);
    $_POST['tx_img'] = utf8_decode($_POST['tx_img_n']);

$crud = new crud('tb_depoimentos'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->atualizar("tx_nome='$_POST[tx_nome]',tx_foto='$_POST[tx_img]',tx_depoimento='$_POST[tx_depoimento]'", "tx_id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
}
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
    <script type="text/javascript" src="../js/tinyMCE_Banner.js"></script>
    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("imagem").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

    </script>
    <!-- /TinyMCE -->

    <title>Gerenciador web4now.com</title>
</head>
<body>
    <? 
require_once '../includes/alert.php'; //  Trata as requizições e emite alerta  -->
require_once '../includes/menu.php'; //  inclui o menu  -->
?>        
<form action="" method="post" enctype="multipart/form-data"><!--   formulario carrega a si mesmo com o action vazio  -->
    <input type="hidden" name="pag" value="testimonials_list.php?tx_id=<?php echo @$getId; ?>&" /><!--   identifica a pagina de requisição para o crud  -->

    <!--   trazendo campos preenchidos caso esteja no modo de ediçao  -->
    <div class="CSSTableGenerator" >  
        <table>
            <tr>
                <td class="backgroundCenter">Depoimento</td>
                <td></td>
            </tr>
          
                    <tr>
                        <td class="backgroundCenter">Nome</td>
                        <td><?php echo utf8_encode(@$campo['tx_nome']);  ?></td>
                    </tr>
                    <tr>
                        <td class="backgroundCenter">Depoimento</td>
                        <td><?php echo utf8_encode(@$campo['tx_depoimento']);  ?></td>
                    </tr>
                </table>
            </div>

</form>        
</body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>