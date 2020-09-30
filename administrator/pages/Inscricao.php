<?
$consulta = mysql_query("SELECT * FROM tb_geral"); 
$campo = mysql_fetch_array($consulta);
if(!@$campo['tx_webmail']){?>
<script>window.location='?Home';</script>
<?}?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--<h2>Cursos</h2>-->
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
					
					<div class="about">
					
						<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
                    <h3>Ficha de Inscrição</h3>
                    <hr> 
<form name="vestibular" target="sql" method="post" action="vestibular/boleto.php" onSubmit="return valida_dados(this);">
<td valign="top">
		<table id="campo1" style="border-collapse: collapse" width="98%" cellpadding="0">
			<tr>
				<td width="137" align='right' valign="top">
				<font color="#B24668">* Nome:&nbsp;</font></td>
				<td class="dif"><input type="text" required class="form-control" name="nome"   ><br></td>

			</tr>
			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Sexo:&nbsp;</font> </td>

				<td class="dif">

				<select required class="form-control" size="1" name="sexo"  >

				<option value="">Selecione</option>

				<option value="MASCULINO">MASCULINO</option>

				<option value="FEMININO">FEMININO</option>

				</select><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Data de Nasc:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" id="dn" name="dn"     OnKeyPress="formatar(this, '##/##/####')" maxlength='10'><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* RG:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" id="rg" name="rg"     ><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* CPF:&nbsp;</font> </td>

				<td class="dif">

				<input required class="form-control" type="text" id="cpf" name="cpf"     OnKeyPress="formatar(this, '###.###.###-##')" maxlength='14'><br></td>

			</tr>
			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* CEP:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" id="cep" name="cep"     OnKeyPress="formatar(this, '#####-###')" maxlength='9' onblur="atualizacep(this.value)"><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Endereço:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" name="endereco"     id='endereco'><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Nº:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" name="numero"    ><br></td>

			</tr>
			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668"> Complemento:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" name="complemento"    ><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Bairro:&nbsp;&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" name="bairro"     id='bairro'><br></td>

			</tr>	

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Cidade:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" name="cidade"     id='cidade'><br></td>

			</tr>
			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Estado:&nbsp;</font> </td>

				<td class="dif">

				<select name="estado" required class="form-control"   id='uf'>
				<option value >Selecione um Estado</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MS">Mato Grosso Do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR" selected>Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="RJ">Rio De Janeiro</option>
				<option value="RN">Rio Grande Do Norte</option>
				<option value="RS">Rio Grande Do Sul</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				</select><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Telefone:&nbsp;</font> </td>

				<td class="dif">

				<input type="text" required class="form-control" id="telefone" name="telefone"     OnKeyPress="formatar(this, '## ########')" maxlength='12'><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Curso desejado:&nbsp;</font> </td>

				<td class="dif">

				<select required class="form-control" size="1" name="curso" >

				<option value="">Selecione</option>

				<option value="ADM">Administração</option>

				<option value="DIR">Direito</option>

				<option value="PED">Pedagogia</option>

				</select><br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">Cadeira Canhota:&nbsp;</font> </td>

				<td class="dif"><input type="radio" name="cadeira" value="Sim"> Sim

				<input type="radio" name="cadeira" value="Não" checked> Não<br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">Banca Especial:&nbsp;</font> </td>

				<td class="dif"><input type="radio" name="banca" value="Sim"> Sim

				<input type="radio" name="banca" value="Não" checked> Não<br></td>

			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* E-mail:&nbsp;</font> </td>

				<td class="dif">

				<input type="email" required class="form-control" id="email" name="email"     ><br></td>

			</tr>


			<tr>

				<td width="137" align='right' valign="top">
				<font color="#B24668">* Como soube do: VESTIBULAR &nbsp;</font> </td>

				<td class="dif">

				 

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="Internet1" checked> Internet

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="TV1"> TV

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="Jornal1"> Jornal

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="Panfleto1"> Panfleto

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="Cartaz1"> Cartaz

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display="none"' value="Radio1"> Radio

				<input type="radio" name="midia" onclick='document.getElementById("amigo").style.display=(document.getElementById("amigo").style.display)? "" : "none"'value="Amigo1"> Amigo<br></td>

			</tr>

			<tr>

				<td width="137" align='right' valign="top"></td>

				<td class="dif"></td>

			</tr>

			<tr id="amigo" style="display: none;">			

			<td width="137" align='right'>

			</td>

				<td class="dif">

				<table class="dif" border="0" width="100%" style="border-collapse: collapse">

					<tr>

						<td width="124"> 
						<p align="right">Nome do amigo&nbsp;</td>

						<td class="dif">

				<br>

				<input type="text" class="form-control" name="nome_amigo"     ><br></td>

					</tr>

					<tr>

						<td width="124"> 
						<p align="right">Curso do amigo 

						</td>

						<td class="dif">
						
				<input type="radio" name="curso_amigo" value="-" checked> Nenhum

				<input type="radio" name="curso_amigo" value="Administração"> Administração

				<input type="radio" name="curso_amigo" value="Pedagogia"> Pedagogia</td>

					</tr>

				</table>

			</td>

			</tr>

			</table>

		</td>

	</tr>

</table>
<hr>
<input class="btn btn-theme btn-lg" type="submit" value="Enviar inscrição" name="B2" style="float: middle; width:100%" align="center">
</form>
   
                    
								</div>
							</div>
						</div>
						
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>
<script>

function formatar(src, mask)
{
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
                src.value += texto.substring(0,1);
  }
}
</script>