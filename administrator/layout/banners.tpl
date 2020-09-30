 <?
unset($_ELEMENTOS);
$banners = mysql_query("SELECT * FROM tb_banners WHERE tx_descricao != 'inativo' && tx_descricao != 'popup' && tx_descricao != 'Popup'");
while($banner=mysql_fetch_array($banners))
{
if($banner[tx_url] != '#'){$link = "<h2 style='cursor:pointer' align='center' onclick=\"window.location='$banner[tx_url]'\" >Clique aqui!</h2>";}
$_ELEMENTOS[] = "<li><img src=\"banners/$banner[tx_img]\" alt=\"\" /><div class=\"flex-caption\">$link<!--<h3>Elegant Design</h3><p>Doloribus omnis minus temporibus perfe.</p>--></div></li>";
}
$total = count($_ELEMENTOS);
$escolhido = rand(0, $total - 1);

echo $_ELEMENTOS[$escolhido];

for($i=0;$i< $total;$i++){
if($i != $escolhido){
echo $_ELEMENTOS[$i];
}

}
?>

     
              