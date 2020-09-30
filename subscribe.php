<?php
	require_once 'inc/MCAPI.class.php';
	$api = new MCAPI('c2bd13d59c5716bec952b73e14d29dd3-us13');
	$merge_vars = array('FNAME'=>$_POST["fname"], 'LNAME'=>$_POST["lname"]);

	// Submit subscriber data to MailChimp
	// For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
	$retval = $api->listSubscribe( '0b057f023a', $_POST["email"], $merge_vars, 'html', false, true );

	if ($api->errorCode){
		echo "<h4>Erro ao processar e-mail.</h4>";
	} else {
		echo "<h4>Obrigado, seu nome foi adicionado na nossa lista de e-mail.</h4>";
	}
?>
