<web4now id="UP">
<br>
<? if($_GET['id'])
{
 echo @$pagina['tx_titulo'];
}
elseif($_GET['pagina'] == 'Ler')
{
echo utf8_decode('Noticia Nº: '. $_GET['Noticia']);
}
elseif($_GET['pagina'] == 'Localizacao')
{
echo utf8_decode('Localização');
}
elseif($_GET['pagina'])
{
echo @$_GET['pagina'];
}
else
{
 echo 'Seja Bem Vindo!';
} 
?>
</web4now>