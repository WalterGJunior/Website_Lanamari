<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
      
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><? echo utf8_encode('Gerenciador web4now.com')?></title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div class="container">

    <form class="form-signin" role="form" method="post" action="Home.php">
      <h2 class="form-signin-heading">Painel Administrativo</h2>
      <h2 class="form-signin-heading"><center>Lanamari</center></h2>
      <input type="text" class="form-control" placeholder="Login" required autofocus name="usuario">
      <input type="password" class="form-control" placeholder="Password" required name="senha">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer login</button>
      <p align="center"><br>
        <? if (isset($_GET[erro])) {?>
        <font color="#ff0000" face="Verdana" size="2">Login ou Senha Inválido!</font>
        <?} ?>
        <? if (isset($_GET[session])) {?>
        <font color="#0000ff" face="Verdana" size="2">Sessão encerrada!</font>
        <?} ?>
      </p>
    </form>
  </div> <!-- /container -->
</body>
</html>
