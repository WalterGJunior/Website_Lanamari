
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
background-image: url('administrator/img/info.png');
box-shadow: 3px 3px 1px #999;
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('administrator/img/success.png');
box-shadow: 3px 3px 1px #999;
}
.warning {
color: #9F6000;
background-color: #FEEFB3;
background-image: url('administrator/img/warning.png');
box-shadow: 3px 3px 1px #999;
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('administrator/img/error.png');
box-shadow: 3px 3px 1px #999;
}
</style>

<? if($_REQUEST['error_cod'])
{
echo"<div class='warning'>Digite corretamente o codigo para continuar!</div>";
}
?> 
<? if($_REQUEST['error'])
{
echo"<div class='error'>Erro ao enviar o email!</div>";
}
?> 
<? if($_REQUEST['success'])
{
echo"<div class='success'>E-mail enviado com sucesso!</div>";
}
?> 