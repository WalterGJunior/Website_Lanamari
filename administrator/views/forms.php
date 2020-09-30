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
document.getElementById("filho"+qtdeCampos).innerHTML = "<font size=5 color=#ff0000>*</font><input type='checkbox' value='required' name='"+qtdeCampos+"'><input type='text' style='width:50%' id='campo"+qtdeCampos+"' name='campo[]' value='Nome do campo: "+qtdeCampos+" aqui'>  <input type='button' style='width:57px; padding: 5px 5px;' class='but but-error but-shadow but-rc' onclick='removerCampo("+qtdeCampos+")' value='Apagar'>";
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
  require_once '../includes/alert.php';
  require_once '../includes/menu.php';
  ?> 
  <form name="form1" action="form_construct.php" method="POST">
    <input type="hidden" name="pag" value="forms.php?" /><!--   identifica a pagina de requisição para o crud  -->
    <div class="CSSTableGenerator" >       
      <table>
        <tr>
          <td class="backgroundCenter">Formulários</td>
        </tr>
        <tr>
          <td class="backgroundCenter">Titulo <input class="campoHidden" required type="text" size="40%"  name="tx_titulo"/></td>
        </tr>
        <tr>              
          <td id="campoPai"></td>
        </tr>
      </table>
    </div>
    <br>
    <input  class="but but-success but-shadow but-rc" type="button" value="Adicionar campos" onclick="addCampos()">
    <input  class="but but-primary but-shadow but-rc" type="submit" value="Enviar">
  </form>
</body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>