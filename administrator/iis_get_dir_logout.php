<?

session_start(); //iniciamos a sessão que foi aberta


session_destroy(); //pei!!! destruimos a sessão ;)


session_unset(); //limpamos as variaveis globais das sessões

echo "<script>top.location.href='index.php?session=TBPW';</script>"; /*aqui você pode por alguma coisa falando que ele saiu ou fazer como eu, coloquei redirecionar para uma certa página*/


?>