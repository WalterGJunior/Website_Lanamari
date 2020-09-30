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
                    <?php 
                    $tb_paginas   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = '".$_GET['Route']."' LIMIT 1");    
                    $pagina       = mysql_fetch_array($tb_paginas); 
                    ?>
                    <h3><?php echo utf8_encode(@$pagina['tx_titulo'])?></h3>
                    <hr>    
                    <?php echo @$pagina['tx_conteudo']?>
<?php
if(@$pagina['tx_formulario_id'])
{

  $tb_formularios  = mysql_query("SELECT * FROM tb_formularios WHERE tx_id = $pagina[tx_formulario_id]");    
  $form  = mysql_fetch_array($tb_formularios);
  
  echo "<br><hr noshade color=\"#C0C0C0\" align=\"left\" width=\"80%\" size=\"1\"><br>";include('administrator/layout/alert_email.tpl');echo base64_decode($form ['tx_form']);
}
?>   
<?php
if(@$pagina['tx_downloads'])
{  
if(@$pagina['tx_downloads'] != 'TODOS'){
  $_REQUEST['abrir'] = true;
  $_REQUEST['pasta'] = base64_encode(@$pagina['tx_downloads']);
  echo "<hr>";
}
  include('administrator/funcoes/arquivos_.php');
}
?> 		
								</div>
							</div>
						</div>
						
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>