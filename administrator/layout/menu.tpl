<? 
$consulta = mysql_query("SELECT * FROM tb_geral"); 
$campo = mysql_fetch_array($consulta);
echo"<td align=\"center\"><a href=\"?pagina=Empresa#UP\" class=\"fonte_padrao\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao';\"   >A Escola</a></td>
<td width=\"60\" align=\"center\"><img src=\"11/imagensc/menu_separa1.png\" width=\"2\" height=\"26\" /></td>";
?>

