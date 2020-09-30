<?php
  include('cabecalho.php');
 ?>
  <!--<div class="container">
    <div class="banner-inner">
      <h1 class="banner-lead">
        <span class="banner-lead-1">Somos um</span>
        <span class="banner-lead-2">atacado de roupas plus size </span>
      </h1>
      <div class="banner-content">
        <p>
          Morbi vel luctus turpis, vel porttitor dolor. Morbi a bibendum ligula. Vivamus sit amet sagittis nibh, et imperdiet lectus. Phasellus vel lorem a velit porta scelerisque.
        </p>
        <br><br>
      </div>
    </div>
  </div>
</div>--></div>

<div id="sobre" class="content-block sobre-block">
  <div class="sobre-block-inner container">
    <div class="animate-block content-block-inner text-center">
      <h2>Coleções</h2>
      <div class="col-10-desktop no-float center-element">
        <p>
          Confira nossas coleções
        </p>
      </div>
    </div>
    <div class="animate-block sobre-content clear">      
      <?php if($_GET['f']){?><h3 class="h3"><?=base64_decode($_GET['f'])?></h3><?}?>
      <div class="our-clients-block clear">
          <ul class="clients-list clear">
                   <?php
                    if(!isset($_GET['f'])){
                    $dir = "galeria/files/";
                    $dh  = opendir($dir);
                    while (false !== ($filename = readdir($dh))) {
                     if ($filename != "." and $filename != "..") {
                        $file[] = $filename;
                     }
                    }
                    sort($file);
                    $count = count($file);
                    for($i=0;$i<$count;$i++){
                   ?>
            <li class="client-item">
              <a href="?f=<?=base64_encode($file[$i])?>"><img class="block img-full" src="<?=$dir.$file[$i].'/1.jpg'?>" alt="1"></a>
              <h4><?=$file[$i]?></h4>
            </li>
              <?php }}?>
 
                   <?php
                    if(isset($_GET['f'])){
                    $dir = "galeria/files/".base64_decode($_GET['f'])."/";
                    $dh  = opendir($dir);
                    while (false !== ($filename = readdir($dh))) {
                     if ($filename != "." and $filename != "..") {
                        $file[] = $filename;
                     }
                    }
                    sort($file);
                    $count = count($file);
                    for($i=0;$i<$count;$i++){
                   ?>

            <li class="client-item">
              <a class="fancybox" href="<?='galeria/files/'.base64_decode($_GET['f']).'/'.$file[$i].''?>"><img class="block img-full" src="<?='galeria/files/'.base64_decode($_GET['f']).'/'.$file[$i].''?>" alt="1"></a>
            </li>

            <div class="<?=$file[$i]?>" style="background: url('<?=$dir.$file[$i].''?>'); background-position: center; background-repeat: no-repeat; cursor:pointer; background-size: 450px;">

              <?php }}?>
  
            </ul>
        </div>        
      </div>
      
    </div>
</div>
<?php
  include('rodape.php');
?>