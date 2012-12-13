<?php
	require_once("./Class/OrderClass.php");
	require_once("./Class/LoginClass.php");
	
	
	if (LoginClass::check_email_password_exists($_GET['user_name'],$_GET['password'])&& )
	{
	OrderClass::confirm_order($_GET['order_ID']);
	echo "Uw order is succesvol bevestigt.";
	header("refresh:4;url=index.php");
	}
	else
	{
		echo "U heeft geen rechten op deze pagina,u wordt terug gestuurd naar de index";
		header("refresh:4;url=index.php");
	}
?>