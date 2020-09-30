<link rel="stylesheet" href="administrator/pages/produtos_menu/styles.css">
<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
<style>
	#produtos{
		margin-top: -20px;
		float: left;
		left: 50%;
		border-radius: 8px;
		width: 750px;
	}
	.produto{
		width: 160px;
		height: 250px;
		margin-top: 15px;
		border: 1px solid #c0c0c0;
		border-radius: 5px;
		float: left;
		margin-left: 15px;
	}
	.produto img{
		width: 85%;
		margin: 12px;
	}
	.produto h1{
		font-size: 12px;
		margin: 8px;

	}
	.produto p{
		margin: 8px;
	}
	.produto h2{
		margin: 10px;
		font-size: 17px;
	}
</style>
<script src="administrator/pages/produtos_menu/script.js"></script>
<table width="100%" >
	<tr>
		<td>
			<form method="POST" action="">
				<label for="consulta">Buscar:</label>
				<br><input type="text" id="busca" name="busca" style="width:170px" /> <input class="but but-success but-shadow but-rc" type="submit" value="OK" />
			</form>
			<?
			if($_REQUEST[busca])
			{

				$busca = base64_encode($_REQUEST[busca]);

				echo"<script>window.location='?pagina=Produtos&cod=$busca#UP'</script>";
			}
			?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="vertical-align: text-top;">
			<div id='cssmenu'>
				<ul>
					<?
					$tb_produtos_categoria  = mysql_query("SELECT * FROM tb_produtos_categoria ORDER By tx_categoria_nome");   
					while($itens_categoria=mysql_fetch_array($tb_produtos_categoria))
					{

						?>
						<li class="has-sub"><a href='#'><? echo $itens_categoria['tx_categoria_nome'] ?></a>
							<ul>
								<?
								$tb_produtos  = mysql_query("SELECT DISTINCT tx_sub_categoria,tx_categoria FROM tb_produtos WHERE tx_categoria =  '$itens_categoria[tx_categoria_nome]' ORDER By tx_categoria");    
								while($itens=mysql_fetch_array($tb_produtos))
								{
									?>
									<li><a href='?pagina=Produtos&cod=<? echo base64_encode(@$itens[tx_sub_categoria]) ?>#UP'><? echo $itens['tx_sub_categoria'] ?></a></li>
									<?}?>
								</ul>
							</li>
							<?}?>
						</ul>
					</div>
				</td>
				<td align="right" >
					<table width="99%" style="vertical-align: text-top;" >
						<tr>
							<td>
								<div id="produtos">
									<?


									if($_REQUEST[cod])
									{
										$tb_produtos  = mysql_query("SELECT * FROM tb_produtos WHERE tx_sub_categoria LIKE '%".base64_decode($_REQUEST[cod])."%' ORDER By tx_nome"); 
									}
									else
									{
										$tb_produtos  = mysql_query("SELECT * FROM tb_produtos WHERE tx_destaque != 'Nao' ORDER By tx_nome LIMIT 8 ");     
									}

									while($itens=mysql_fetch_array($tb_produtos))
									{
										?>

										<div class="produto" id="galaxy" style="cursor:pointer; opacity:1;filter:alpha(opacity=100)" onmouseover="this.style.opacity=0.4;this.filters.alpha.opacity=40" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100">
											<a onclick="window.location='?pagina=Detalhes-Do-Produto&codigo=<? echo @$itens[tx_id] ?>#UP'">
												<img src="produtos/<? echo @$itens[tx_id] ?>/<? echo @$itens[tx_id] ?>.jpg"/>
												<h1><? echo @$itens[tx_nome] ?></h1>
												<p><? echo substr(utf8_decode(@$itens[tx_descricao]), 0, 50); ?>...</p>
												<h2 style="color:#666666"><? if(@$itens[tx_valor] == 0){echo 'Consulte!';}else{echo 'R$'.number_format(@$itens[tx_valor], 2, ',', '.');} ?></h2>
											</a>
										</div>

										<?
									}
									?>
								</div>
							</td>
						</tr>
					</table>
					<br>
				</td>
			</tr>
		</table>