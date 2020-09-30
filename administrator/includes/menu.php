   <?php
            //if($con->connect() == true){
           //     echo "Logado como: <b>" . $_SESSION['usuarioNome']."</b><br><br>";
           // }else{
           //     echo 'Não conectado';
           // }
        ?>
    <link rel="stylesheet" href="../css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>
   <script language='javascript'>
        function abre_atendimento()
        {
          var width = 450;
          var height = 600;
          var left = (screen.width - width) / 2;
          var top = ((screen.height - height) / 2) - 30;
        
          var w = window.open('http://polaristecnologia.com.br/suporte/chat.php', 'at',  'height=' +height+ ', width=' +width+ ',status=no, toolbar=no, resizable=no, scrollbars=no, minimizable=no, left=' +left+ ', top=' +top);
        }
      </script>   
<div id='cssmenu' style="z-index:3">
<ul>
   <li class='active'><a href='http://www.web4now.com'><span><img src="http://www.polaristecnologia.com.br/images/web4now/rodape_web4now.png" width="85" height="15" border="0" /></span></a></li>
   <li><a href='index.php'><span>Início</span></a></li>
   <? 
   $consultaGeral = mysql_query("SELECT * FROM tb_geral"); 
   $verifica = mysql_fetch_array($consultaGeral);
   if(@$verifica['tx_galeria']){
   ?>
   <li><a href='galery.php'><span>Galeria</span></a></li>
   <?}?>
   <li><a href='../iis_get_dir_logout.php'><span>Sair</span></a></li>
   </ul>
   </li>
</ul>
</div>
<br>
