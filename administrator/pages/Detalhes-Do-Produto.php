<head>
        <link rel="stylesheet" href="administrator/galery/index_files/vlb_files1/vlightbox1.css" type="text/css" />
        <link rel="stylesheet" href="administrator/galery/index_files/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
        <script src="administrator/galery/index_files/vlb_engine/visuallightbox.js" type="text/javascript"></script>
        <link href="administrator/css/product.css" rel="stylesheet" type="text/css" />

</head>

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eec7dc363cb18f6"></script>

<table width="100%">
        <tr>
                <td>
                        <div class="conteudo_informacoes">



                                <style type="text/css">

                                        .ficha_titulo, .ficha_texto18, .ficha_texto11 { color:#011841; }

                                        .ficha_link11:hover { color:#011841; }

                                        .ficha_dadosprincipais_titulo { border-bottom-color:#CCC; }

                                        .ficha_dadosprincipais_icones, .ficha_nenhum { border-bottom-color:#F5F5F5; }

                                        .ficha_nenhum { background-color:#F5F5F5; }

                                        .ficha_fotos, .ficha_mapa, .ficha_anunciante_logo, .ficha_detalhesedificio_botoes , .ficha_detalhesedificio_botoes2, .ficha_detalhesedificio, .ficha_detalhesedificio_barra, .proposta_formulario, .proposta_inputform, .proposta_selectform, .proposta_textareaform, .formularios_captcha_input, .jcarousel-skin .jcarousel-container {  border-color:#DDD;  }

                                        .ficha_comodos, .ficha_fotos_legenda, .ficha_detalhesedificio_botoes, .proposta_inputform, .proposta_selectform, .proposta_textareaform, .formularios_captcha_input { background-color:#F5F5F5; }

                                        .jcarousel-skin .jcarousel-next-horizontal, .jcarousel-skin .jcarousel-prev-horizontal, .proposta_button, .ui-icon-circle-triangle-e, .ui-icon-circle-triangle-w { background-color:#011841 !important; }

                                        .ficha_temporada table { border-color:#CCC; }

                                        .ficha_temporada table td { border-color:#DDD; background-color:#F5F5F5; }

                                        .formularios_verificar { border-color:#011841; }

                                        .resultados_automoveis_botoes { background-color:#011841; }

                                        .bordaMiniatura { border:2px solid #bc9449; }

                                        #atual, #total { color:#bc9449; }

                                        .ui-datepicker-inline { border-color:#DDD !important; }

                                        .ui-datepicker-calendar tbody td { background-color:#FFF !important }

                                        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .temp_disponivel, .temp_ocupado { border:1px solid #DDD !important; color:#bc9449 !important }

                                        .ui-state-default, .ui-datepicker-today a, .temp_disponivel, .temp_ocupado { background-color:#F5F5F5 !important; }

                                </style>

                                <?

                                $codigo = $_REQUEST['codigo'];



                                $consulta = mysql_query("SELECT * FROM tb_produtos WHERE `tx_id` = '$codigo'");

                                $linhas = mysql_num_rows($consulta);

                                while($reg=mysql_fetch_array($consulta)){

                                        echo"	

                                        <div class=\"ficha_dadosprincipais\">

                                                <div class=\"ficha_dadosprincipais_titulo\">

                                                        <span class=\"ficha_texto11\">Ref.: $reg[tx_id]</span><br>

                                                        <span class=\"ficha_texto11\">Cat.: $reg[tx_categoria]</span><br><br>

                                                        <span class=\"ficha_texto18 ficha_titulo\" style='text-transform:uppercase;'>$reg[tx_nome]</strong></span><br>

                                                        <span class=\"ficha_texto11\"><br></span>



                                                        <div class=\"addthis_default_style\">

                                                                <a class=\"addthis_button_facebook_like\" fb:like:layout=\"button_count\" fb:like:send=\"false\"></a>

                                                        </div>

                                                </div>





                                                <div class=\"ficha_subtitulos\"><span class=\"ficha_texto16 ficha_titulo\">"; echo utf8_decode('Informações complementares'); echo"</span></div>	

                                                <div class=\"ficha_comodos\">"; echo utf8_decode("$reg[tx_descricao]"); echo"</div>



                                        </div>

                                        <div class=\"ficha_fotosproposta\">



                                                <style>.ficha_fotos { border-top:1px solid #DDD }</style>



                                                <div class=\"ficha_fotos\"><a href=\"#\" id=\"linkfotoGde\">";

                                                        if($reg[tx_img] == '0'){echo"<a class='vlightbox1' href='produtos/sem_imagem.gif' title='$reg[tx_nome]'><img src='produtos/sem_imagem.gif' alt='Ref:$reg[tx_id]' width='260' height='210' id='foto' style='border:10px double #CECECE; cursor:pointer'></a>";}

                                                        else{echo"<a class='vlightbox1' href='produtos/$reg[tx_id]/$reg[tx_id].jpg' title='$reg[tx_nome]'><img src='produtos/$reg[tx_id]/$reg[tx_id].jpg' alt='Ref:$reg[tx_id]' width='260' height='210' id='foto' style='border:10px double #CECECE; cursor:pointer'></a>";}



                                                        $dir = "produtos/$reg[tx_id]/"; 

                                                        $scan = scandir($dir);


                                                        if(count($scan) > 2) {





                                                                $aberto = opendir($dir);

                                                                $i = 0;

                                                                while ($arq = readdir($aberto)) {

                                                                        if ($arq != "." and $arq != "..") { 

                                                                                $foto[$i] = $arq;                        
                                                                                $i++;

                                                                        }

                                                                }
                                                                sort($foto);             
                                                                $j=0;        
                                                                while ($foto[$j] != "") {
                                                                        if($foto[$j] == $reg[tx_img]){
                                                                                $titulo = ($j+1);
                                                                                echo"";
                                                                        }
                                                                        else
                                                                        {
                                                                                echo"<a class='vlightbox1' href='produtos/$reg[tx_id]/$foto[$j]' title='$reg[tx_nome]'><img src='produtos/$reg[tx_id]/$foto[$j]' alt='Ref:$reg[tx_id]' width='50' id='foto' style='border:10px double #CECECE; cursor:pointer'></a>";
                                                                        }
                                                                        $j++;
                                                                }

                                                        }

                                                        else {

                                                        }

                                                        echo"

                                                        <div class=\"ficha_fotos_legenda\">Clique sobre a foto para ampliar</div>

                                                </div>


                                        </div>

                                </div>

                        </div>

                        ";

                }

                ?>
        </div>
</td>
</tr>
</table>
<br>
<hr style='border-top: 1px dashed #c0c0c0; ;border-right: 1px solid transparent; border-left: 1px solid transparent ;border-bottom: 1px solid transparent;background-color: transparent;height: 4px;color: transparent;'>
<br>
<br>
<br><script src="administrator/galery/index_files/vlb_engine/vlbdata1.js" type="text/javascript"></script>