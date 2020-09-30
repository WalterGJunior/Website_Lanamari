<?

include('administrator/funcoes/limitaCaracteres.php'); //Inclui a função para limitar caracteres.

$pagina = (isset($_GET['p']))? $_GET['p'] : 1; //verifica a página atual caso seja informada na URL, senão atribui como 1ª página

$tb_noticias = mysql_query("SELECT * FROM tb_noticias");// consulta SQL tabela noticias

$total = mysql_num_rows($tb_noticias);//conta o total de itens

$registros = 5; //seta a quantidade de itens por página, neste caso, 2 itens

$numPaginas = ceil($total/$registros);//calcula o número de páginas arredondando o resultado para cima

$inicio = ($registros*$pagina)-$registros;//variavel para calcular o início da visualização com base na página atual

//seleciona os itens por página
$tb_noticias = "select * from tb_noticias order by tx_id desc limit $inicio,$registros";
$tb_noticias = mysql_query($tb_noticias);
$total = mysql_num_rows($tb_noticias);


while($tx_noticias=mysql_fetch_array($tb_noticias)) //exibe os noticias selecionados
{
@$tx_noticias['tx_noticia'] = strip_tags(@$tx_noticias['tx_noticia']);
@$tx_noticias['tx_noticia'] = limita_caracteres(@$tx_noticias['tx_noticia'], 200); //limita os caracteres do conteudo criando uma resenha.

echo"<div class=\"post\" id='top'>
<h4>
    <a href=\"?pagina=Ler&Noticia=$tx_noticias[tx_id]#UP\">
        ".utf8_encode(@$tx_noticias['tx_titulo'])."
    </a>
</h4>
<span class=\"blog-meta\"><b><i>".date('d/m/Y', strtotime(@$tx_noticias['tx_data']))."</i></b></span>
<!--<img src=\"images/bg-1.jpg\" class=\"img-responsive\" alt=\"\">-->
<p>
    ".@$tx_noticias['tx_noticia']."
</p>
</div><!--post end-->";}

?>
  <nav>
      <ul class="pagination pull-right">
        <li><a href="?pagina=Noticias">Ver Todas</a></li>
      </ul>
    </nav>


</div>