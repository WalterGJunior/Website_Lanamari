<?
$pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id > '2' ORDER by tx_id ASC LIMIT 2");

$countPag = mysql_num_rows($pgLinks);

while($pgLink=mysql_fetch_array($pgLinks))
{
  echo"<td width=\"50%\" height=\"22\">- <a href=\"?id=$pgLink[tx_id]#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\">$pgLink[tx_titulo]</a></td>";
}

?>
</tr>
<tr>
  <?
  $pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id > '2' ORDER by tx_id ASC LIMIT 2, 2");

  $countPag = mysql_num_rows($pgLinks);

  while($pgLink=mysql_fetch_array($pgLinks))
  {
  echo"<td width=\"50%\" height=\"22\">- <a href=\"?id=$pgLink[tx_id]#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\">$pgLink[tx_titulo]</a></td>";
}

?>
</tr>
<tr>
  <?
  $pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id > '2' ORDER by tx_id ASC LIMIT 4, 2");

  $countPag = mysql_num_rows($pgLinks);

  while($pgLink=mysql_fetch_array($pgLinks))
  {
  echo"<td width=\"50%\" height=\"22\">- <a href=\"?id=$pgLink[tx_id]#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\">$pgLink[tx_titulo]</a></td>";
}

?>
</tr>
<tr>
  <?
  $pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id > '2' ORDER by tx_id ASC LIMIT 6, 2");

  $countPag = mysql_num_rows($pgLinks);

  while($pgLink=mysql_fetch_array($pgLinks))
  {
  echo"<td width=\"50%\" height=\"22\">- <a href=\"?id=$pgLink[tx_id]#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\">$pgLink[tx_titulo]</a></td>";
}

?>
</tr>
<tr>
  <?
  $pgLinks   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id > '2' ORDER by tx_id ASC LIMIT 8, 2");

  $countPag = mysql_num_rows($pgLinks);

  while($pgLink=mysql_fetch_array($pgLinks))
  {
  echo"<td width=\"50%\" height=\"22\">- <a href=\"?id=$pgLink[tx_id]#UP\" class=\"fonte_padrao_branca\" onmouseover=\"this.className='fontepadrao_cor';\" onmouseout=\"this.className='fonte_padrao_branca';\">$pgLink[tx_titulo]</a></td>";
}

?>