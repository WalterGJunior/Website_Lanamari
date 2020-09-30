<?php
require_once 'administrator/class/conexao.class.php';
require_once 'administrator/class/crud.class.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco

if(isset($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra           

    $_POST['tx_depoimento'] = utf8_decode($_POST['tx_depoimento']);
    $_POST['tx_data'] = date('Y-m-d'); 

$crud = new crud('tb_depoimentos');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$crud->inserir("tx_nome,tx_foto,tx_depoimento,tx_data,tx_ativo","'$_POST[tx_nome]','no-foto.jpg','$_POST[tx_depoimento]','$_POST[tx_data]','1'"); 

}
?>
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
                    $tb_paginas   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = 2 LIMIT 1");    
                    $pagina       = mysql_fetch_array($tb_paginas); 
                    ?>
                    <h3><?php echo utf8_encode(@$pagina['tx_titulo'])?></h3> 
                    <hr>   
                    <?php echo @$pagina['tx_conteudo']?>  
		
			</div><hr>                    <? if($_REQUEST['insert']){?>
                    <div id="UP" class="success" style="padding:10px"><font color="green" size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Depoimento enviado com sucesso!</font></div>
                    <?}?><h3>Deixe seu depoimento</h3><br>
                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" required class="form-control" name="tx_nome" id="name" placeholder="Nome">
                            <!--<input type="hidden" name="tx_foto" value="../images/sem_foto.jpg">-->
                            <input type="hidden" name="pag" value="?pagina=SobreNos&" />
                            <input type="hidden" name="cadastrar" value="yes">
                        </div>
                        <div class="form-group">
                            <label for="cmnt">Depoimento</label>
                            <textarea class="form-control" required id="cmnt" rows="4" name="tx_depoimento" placeholder="Depoimento" maxlength="350"></textarea><font size="1.8">( Max. 350 Caracteres )</font>

                        </div>
                        <button type="submit" class="btn red pull-right btn-lg">Enviar</button>
                    </form>
							</div>
						</div>
						
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>