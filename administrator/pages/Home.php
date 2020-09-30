	<!-- end header -->
	<section id="featured">
	 
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
            <? include('administrator/layout/banners.tpl') ?> 
            </ul>
        </div>
	<!-- end slider -->
 
	</section> 
		<section id="content">	
	<div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                 <img src="img/1.jpg" alt="" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div>
                    <?php include'administrator/pages/NoticiasHome.php';?>                        
                    </div>
                </div>
            </div>
        </div>
     
    </section>
    
    <hr align='center' width='50%'>
    <section id="service">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-bottom">
                            <div class="service-tab">
                                  <!-- Nav tabs -->
                                  <ul class="badhon-tab" role="tablist">
                                    <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    <?php 
                                    $tb_a   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = 3 LIMIT 1");    
                                    $a      = mysql_fetch_array($tb_a); 
                                    ?>                                     
                                    <?php echo utf8_encode(@$a['tx_titulo'])?>
                                    </a></li>
                                    <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <?php 
                                    $tb_b   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = 4 LIMIT 1");    
                                    $b      = mysql_fetch_array($tb_b); 
                                    ?> 
                                    <?php echo utf8_encode(@$b['tx_titulo'])?> 
                                    </a></li>
                                    <li><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <?php 
                                    $tb_c   = mysql_query("SELECT * FROM tb_paginas WHERE tx_id = 5 LIMIT 1");    
                                    $c      = mysql_fetch_array($tb_c); 
                                    ?> 
                                    <?php echo utf8_encode(@$c['tx_titulo'])?> 
                                    </a></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content edit-tab-content">
                                    <div class="tab-pane edit-tab active" id="home">
                                        <?php echo @$a['tx_conteudo']?>
                                    </div>
                                    <div class="tab-pane edit-tab" id="profile">
                                        <?php echo @$b['tx_conteudo']?>
                                    </div>
                                    <div class="tab-pane edit-tab" id="messages">
                                        <?php echo @$c['tx_conteudo']?>
                                    </div>
                                   
                                  </div>
                            </div>
                        </div>
                    </div><!-- .col-md-12 close -->
                </div><!-- row close -->
            </div><!-- .container close -->
        </section>
    
    
<div class="testimonial-area">
    <div class="testimonial-solid">
        <div class="container">           
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                        <? 
                        $tb_paginas   = mysql_query("SELECT * FROM tb_depoimentos WHERE tx_ativo = '0' ORDER By RAND()");
                        $count = 0;    
                        while($pagina= mysql_fetch_array($tb_paginas))
                        { 
                     ?>
                    <?if($count == 0){?>
                    <div class="item active">
                    <? }else{?>
                    <div class="item">
                    <?}?>
                        <p><?echo utf8_encode(@$pagina['tx_depoimento']);?></p>
                        <p>
                            <b>- <?echo utf8_encode(@$pagina['tx_nome']);?> -</b>
                        </p>                       
                    </div>
                    <?$count++;}?>                    
                </div>
            </div>
        </div>
    </div>
</div>