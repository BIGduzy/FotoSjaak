<?php
	require_once("./class/SessionClass.php");
	$session->logout();
	header("refresh:3;index.php");
?>