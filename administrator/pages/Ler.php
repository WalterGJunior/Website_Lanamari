<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.jsubid=ra-4eec7dc363cb18f6"></script>
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
                    <h3>Notícia</h3><hr> 
<?

$tb_noticias = mysql_query("SELECT * FROM tb_noticias WHERE tx_id = '$_GET[Noticia]'");// consulta SQL tabela noticias

while($tx_noticias=mysql_fetch_array($tb_noticias)) //exibe os noticias selecionados
{

    echo"<div class=\"post\">
    <h3>
        <a href=\"?pagina=Ler&Noticia=$tx_noticias[tx_id]#UP\">
            ".utf8_encode(@$tx_noticias['tx_titulo'])."
        </a>
    </h3>
    <span class=\"blog-meta\"><b><i>".date('d/m/Y', strtotime(@$tx_noticias['tx_data']))."</i></b></span>
    <!--<img src=\"images/bg-1.jpg\" class=\"img-responsive\" alt=\"\">-->
    <p>
        ".@$tx_noticias['tx_noticia']."
    </p>
</div><!--post end-->";}


//for($i = 1; $i < $numPaginas + 1; $i++) { }
?>

                       
                  
								</div>
							</div>
						</div>
						<a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:send="false"></a> 
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>

