<? 
$consulta = mysql_query("SELECT * FROM tb_geral"); 
$campo = mysql_fetch_array($consulta);
echo"<tr><td height=\"22\">- <a href=\"?pagina=Empresa#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\"  >A Empresa</a></td></tr>";
if(@$campo['tx_noticias']){
echo utf8_decode("<tr><td height=\"22\">- <a href=\"?pagina=Noticias#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\"  >Notícias</a></td></tr>");}
if(@$campo['tx_galeria']){
echo"<tr><td height=\"22\">- <a href=\"?pagina=Galeria#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\"  >Galeria</a></td></tr>";}
?>