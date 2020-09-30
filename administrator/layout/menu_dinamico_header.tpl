<?
$pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id  > '2'  ORDER by tx_id ASC"); 
while($pgLink=mysql_fetch_array($pgLinks))
{
	echo"<td width=\"2\" align=\"center\"><img src=\"11/imagensc/menu_separa2.png\" width=\"2\" height=\"45\" /></td>
	<td  align=\"center\"  class=\"fonte_menusup\" onmouseover=\"this.className='fonte_menusupb';\" onmouseout=\"this.className='fonte_menusup';\"  onClick=\"location.href='?id=$pgLink[tx_id]#UP'\" >$pgLink[tx_titulo]</td>";
}
$consulta = mysql_query("SELECT * FROM tb_geral"); 
$campo = mysql_fetch_array($consulta);

if(@$campo['tx_produtos']){echo"<td width=\"2\" align=\"center\"><img src=\"11/imagensc/menu_separa2.png\" width=\"2\" height=\"45\" /></td>
<td  align=\"center\"  class=\"fonte_menusup\" onmouseover=\"this.className='fonte_menusupb';\" onmouseout=\"this.className='fonte_menusup';\"  onClick=\"location.href='?pagina=Produtos#UP'\" >Produtos</td>";}
if(@$campo['tx_noticias']){echo"<td width=\"2\" align=\"center\"><img src=\"11/imagensc/menu_separa2.png\" width=\"2\" height=\"45\" /></td>
<td  align=\"center\"  class=\"fonte_menusup\" onmouseover=\"this.className='fonte_menusupb';\" onmouseout=\"this.className='fonte_menusup';\"  onClick=\"location.href='?pagina=Noticias#UP'\" >Not&iacute;cias</td>";}
if(@$campo['tx_galeria']){echo"<td width=\"2\" align=\"center\"><img src=\"11/imagensc/menu_separa2.png\" width=\"2\" height=\"45\" /></td>
<td  align=\"center\"  class=\"fonte_menusup\" onmouseover=\"this.className='fonte_menusupb';\" onmouseout=\"this.className='fonte_menusup';\"  onClick=\"location.href='?pagina=Galeria#UP'\" >Galeria de Fotos</td>";}
if(@$campo['tx_webmail']){echo"<td width=\"2\" align=\"center\"><img src=\"11/imagensc/menu_separa2.png\" width=\"2\" height=\"45\" /></td>
<td  align=\"center\"  class=\"fonte_menusup\" onmouseover=\"this.className='fonte_menusupb';\" onmouseout=\"this.className='fonte_menusup';\"  onClick=\"location.href='http://$_SERVER[HTTP_HOST]:2095'\" >WebMail</td>";}

?>