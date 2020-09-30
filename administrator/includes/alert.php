<style>
.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 10px 0px;
padding:15px 10px 15px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('../img/info.png');
box-shadow: 3px 3px 1px #999;
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('../img/success.png');
box-shadow: 3px 3px 1px #999;
}
.warning {
color: #9F6000;
background-color: #FEEFB3;
background-image: url('../img/warning.png');
box-shadow: 3px 3px 1px #999;
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('../img/error.png');
box-shadow: 3px 3px 1px #999;
}
</style>
<? 
if($_REQUEST['deleteReg'] == 'yes')
{
echo"<div class='warning'>Tem certeza que deseja excluir o registro? <a href='?delete=yes&pag=$_GET[pag]&tx_id=$_GET[tx_id]'>[SIM]</a> <a href='?tx_id=$_GET[tx_id]'>[NÃO]</a></div>";
}
?>
<? if($_REQUEST['warnings'] == 'alert_pages')
{
echo"<div class='warning'>Você atingiu o limite de paginas!</div>";
}
?>
<? if($_REQUEST['warnings'] == 'alert_forms')
{
echo"<div class='warning'>O Formulário não pode ser criado!, precisa adicionar no mínimo 1 campo.</div>";
}
?>
<? if($_REQUEST['delete'])
{
echo"<div class='success'>Registro Deletado com Sucesso!</div>";
}
?>
<? if($_REQUEST['update'])
{
echo"<div class='success'>Registro Atualizado com Sucesso!</div>";
}
?>
<? if($_REQUEST['insert'])
{
echo"<div class='success'>Registro Inserido com Sucesso!</div>";
}
?> 
<? if($_REQUEST['error'])
{
echo"<div class='error'>Um problema inesperado aconteceu, operação cancelada!</div>";
}
?> 