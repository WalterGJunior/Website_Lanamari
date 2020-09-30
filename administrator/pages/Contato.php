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
                                <h3>Fale Conosco</h3>
                                       <? if($_GET['enviar']){include('administrator/funcoes/2enviaEmail.php');} ?>
                                        <div class="row target">
                                            <div class="col-md-6">
                                                <div class="contact-col">
                                                    <div style="max-height: 400px; min-height: 450px;">
                                                        <form action='?pagina=Contato&enviar=true#UP' method='post'>                            
                                                            <div class="form-group">
                                                                <label for="name">Nome</label>
                                                                <input type="text" required class="form-control"  name="nome" id="name" placeholder="Nome">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" required class="form-control" name="endemail" id="email" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Tel</label>
                                                                <input type="text" required class="form-control" name="telefone" id="telefone" placeholder="Telefone">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="msg">Sua Mensagem</label>
                                                                <textarea required class="form-control" id="msg" name="mensagem" rows="5" placeholder="Mensagem"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn red btn-lg">Enviar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact-col">
                                                    <div style="max-height: 400px; min-height: 450px;">
                                                        <? 
                                                        $tb_paginas   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = '12' LIMIT 1");    
                                                        $pagina       = mysql_fetch_array($tb_paginas);    
                                                        echo @$pagina['tx_conteudo']; 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
								</div>
							</div>
						</div>
						
						<hr>
						<br>						
						
					</div>									
				</div>
	</section>