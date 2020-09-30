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
                    <h3><?=base64_decode($_GET['pasta'])?></h3>
                    <hr> 
					<section id="projects">
                                       <?php if($_GET['pasta']){?><a href="?pagina=Galeria" class="btn">Voltar</a><br><br><?}?>
					<ul id="thumbs" class="portfolio">
 <?

      if(!$_GET['pasta'])
      {
        $path = "galeria/.thumbs/files/"; 
        $diretorio = dir($path);
        $albuns = 0;
        while($arquivo = $diretorio -> read()){
          if ($arquivo != "." and $arquivo != "..") { 
            $handle = opendir("galeria/.thumbs/files/$arquivo");				

            $files = 0;

            while (false !== ($file = readdir($handle)))
            { 
              if ($file != "." && $file != ".." && !(is_dir($pasta . $file))) { 
                $files++;
              } 
            }
            ?>
                                                <!-- Item Project and Filter Name -->
						<li class="item-thumbs col-md-3 design" data-id="id-0" data-type="web">                                                
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?=utf8_decode($pasta)?>" href="?pagina=Galeria&pasta=<?=base64_encode($arquivo)?>">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-folder"></i></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="galeria/files/<?=utf8_decode($arquivo).'/1.jpg'?>" alt="">
						<h4><?=utf8_decode($arquivo)?></h4></li>
						<!-- End Item Project -->

          <?
          }
          $albuns++;
        }
      }
      ?>
      <?php

      if($_GET['pasta'])
      {
        $pasta = base64_decode($_GET['pasta']);
        $path  = "galeria/files/$pasta"; 

        $diretorio = dir($path);

        $albuns = 0;
        while($arquivo = $diretorio -> read()){
          if ($arquivo != "." and $arquivo != "..") { 
            $handle = opendir("galeria/files/$pasta/$arquivo");

            $files = 0;

            while (false !== ($file = readdir($handle)))
            { 
              if ($file != "." && $file != ".." && !(is_dir($pasta . $file))) { 
                $files++;
              } 
            }
            ?>
                                                <!-- Item Project and Filter Name -->
						<li class="item-thumbs col-md-3 design" data-id="id-0" data-type="web">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?=utf8_decode($pasta)?>" href="galeria/files/<?=utf8_decode($pasta).'/'.$arquivo;?>">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-search"></i></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="galeria/files/<?=utf8_decode($pasta).'/'.$arquivo;?>" alt="">
						</li>
						<!-- End Item Project -->

          <?
          }
          $albuns++;
        }
      }
      ?>	
						
					</ul>
					</section>
	</div>
							</div>
						</div>
						
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>
				