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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/web4now.css" />
  <script src="../js/DD_roundies_0.0.2a-min.js" type="text/javascript"></script>
  <script>DD_roundies.addRule('.box_login', '5px', true);</script>
  <title>Gerenciador web4now.com</title>
</head>
<body>
  <?php
$antispam = false; // Captcha desativado rand-image com problemas.

// cPanel info OBS. Pasta Administrator na Rais do Dominio
$cpuser = 'polar752'; // Login CPNEL
$cppass = base64_decode('Q2FkZWFkb2ZpeG84QA==');//Senha
$cpdomain = 'polaristecnologia.com.br'; // IP ou dominio do cPanel
$cpskin = 'x3';  // Skin do cPanel 

// E-mail padrão que vai receber informações das novas contas.
// These will only be used if not passed via URL
$epass = 'IxW1%eg3cll?'; // senha do e-mail
if (substr($_SERVER['HTTP_HOST'],0,3) == 'www') {
  $edomain = substr($_SERVER['HTTP_HOST'], 4);
}
else
{
  $edomain = $_SERVER['HTTP_HOST'];
}// dominio do e-mail, o mesmo que o cPanel.
$equota = $_POST[tamanho]; // tamanho em MB

############################################################### 
# END OF SETTINGS
############################################################### 

function getVar($name, $def = '') {
  if (isset($_REQUEST[$name]))
    return $_REQUEST[$name];
  else 
    return $def;
}

function delTree($dir) { 
  $files = array_diff(scandir($dir), array('.','..')); 
  foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
  } 
  return rmdir($dir); 
}

// check if overrides passed
$euser = getVar('user', '');
$epass = getVar('pass', $epass);
$edomain = getVar('domain', $edomain);
$equota = getVar('quota', $equota);

$msg = '';

if (!empty($euser))
  while(true) {

    if ($antispam) {
@session_start(); // Inicia a sessão caso ela não tenha iniciado.
if ($_SESSION['AntiSpamImage'] != $_REQUEST['anti_spam_code']) {
// Seta uma string de anti-spam
  $_SESSION['AntiSpamImage'] = rand(1,9999999);

// Avisa sobre os usuarios sobre a mensagem de anti-spam.
  $msg = "<div class='error'>Mensagem Anti-Spam Incorreta</div>";
  break;
}
else {
// Seta ao Anti-Spam alguma numero randomico
  $_SESSION['AntiSpamImage'] = rand(1,9999999);
}
}

// Cria a conta de e-mail
if($_REQUEST[action] == 'new')
{
  $f = fopen ("http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/doaddpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota", "r");
}
elseif($_REQUEST[action] == 'update')
{
  $f = fopen ("http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/dopasswdpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota", "r");
}
elseif($_REQUEST[action] == 'delete')
{
  $f = fopen ("http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/realdelpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota", "r");
  $path = "../../../../mail/$edomain/$_REQUEST[user]";
  delTree($path);
}
if (!$f) {
  $msg = "<div class='error'>Impossivel criar a conta de e-mail!, : Funcionaliade 'fopen' não habilitado no servidor, PHP esta rodando com safe_mode ativo";
  break;
}
$actionFeita = strtolower($_REQUEST[action]);


if($_REQUEST[action] == 'new')
{
  $msg = "<div class='success'>Conta de e-mail <b>{$euser}@{$edomain}</b> Criada com Sucesso!</div>";
}
elseif($_REQUEST[action] == 'delete')
{
  $msg = "<div class='success'>Conta de e-mail <b>{$euser}@{$edomain}</b> Deletada com Sucesso!</div>";  
}
elseif($_REQUEST[action] == 'update')
{
  $msg = "<div class='success'>Conta de e-mail <b>{$euser}@{$edomain}</b> Alterada com Sucesso!</div>";  
}


// Checa o resultado
while (!feof ($f)) {
  $line = fgets ($f, 1024);
  if (ereg ("already exists", $line, $out)) {
    $msg = "<div class='warning'>Conta de e-mail <b>{$euser}@{$edomain}</b> existente do servidor.</div>";
    break;
  }
}
@fclose($f);
break;
}
?>
<? echo @$msg; ?>          
<? 
require_once '../includes/alert.php';
require_once '../includes/menu.php';
?> 
<form name="frmEmail" method="post">
  <div class="CSSTableGenerator" > 
    <table>
      <tr>
        <td>Gerenciar Email`s</td>
        <td>&nbsp;</td>
      </tr>
      <?php
      if($_REQUEST[mode] == 'creation')
      {
        $euser = htmlentities($euser);
        ?>
        <tr>
          <td class="backgroundCenter">Nome</td>
          <td><input  class="campocreationEmail" required name="user" value="<? echo @$euser ?>" /> <? echo '@'.$edomain ?></td></tr>
          <tr>
            <?
          }
          else
          {
            echo"<tr>
            <td class='backgroundCenter'>E-mail</td>
            <td><select class='campocreationEmail' name='user'>
              ";
              $path = "../../../../mail/$edomain/";
              $diretorio = dir($path);
              while($emails = $diretorio -> read())
              {
                if(($emails != '.')&&($emails != '..'))
                  echo"<option value='$emails'>$emails@$edomain</option>";
              }
              echo"</select></td></tr>";
            }
            ?>
            <?php 
            if(($_REQUEST[action] == 'new')or($_REQUEST[action] == 'update'))
            {
              ?>
              <tr>
                <td class="backgroundCenter">Senha</td>
                <td><input  class="campocreationEmail" required name="pass" type="password" /></td>
              </tr>
              <?
            }
            ?>
            <input name="action" type="hidden" value="<?php echo $_REQUEST[action];?>" />
            <?php if ($antispam) { ?>
            <?php } ?>
          </table>
        </div>
        <br>
        <?php if($_REQUEST[action] == 'delete'){$btt = "Excluir"; $ttp = 'error';}elseif($_REQUEST[action] == 'update'){$btt = "Editar"; $ttp = 'primary';}elseif($_REQUEST[action] == 'new'){$btt = "Cadastrar";  $ttp = 'success';}?>
        <input type="submit" class="but but-<? echo @$ttp ?> but-shadow but-rc" value="<? echo @$btt ?>" name="B1">
      </form>