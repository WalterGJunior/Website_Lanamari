<?php
include("../iis_get_dir_security.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<?php

if(($_GET[excluir])&&($_GET[tx_id]))
{
	require_once '../class/conexao.class.php';
	require_once '../class/crud.class.php';

$con = new conexao();  // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$crud = new crud('tb_paginas'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
$tx_id = $_GET['tx_id']; //pega id para exclusao caso exista
$crud->excluir("tx_id = $tx_id"); // exclui o registro com o id que foi passado

$con->disconnect(); // fecha a conexao

echo"<script>parent.window.location='?exclusao=success'</script>";
}
?>