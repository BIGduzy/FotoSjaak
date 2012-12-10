<!DOCTYPE html>
<html>
	<head>
		<title>Jumbo games</title>
		
		<link rel='stylesheet' type='text/css' href='./css/opmaak.css' />
		<link rel='stylesheet' type='text/css' href='./css/overcast/jquery-ui-1.9.2.custom.css' />
		<script style='text/javascript' src='./js/script.js'></script>
		<script style='text/javascript' src='./Jquery/jquery-1.8.3.js'></script>
		<script style='text/javascript' src='./Jquery/jquery-ui-1.9.2.custom.js'></script>
	</head>

	<body>
		<div id="container">
			<div id="banner">
				<?php include("banner.php");?>
			<div id='link'>
				<?php include("./class/SessionClass.php");  ?>
				<?php include("link.php"); ?>
			</div>
			</div>
			
			<div id="content">
				<?php include("navigation.php")?>
			</div>
			
			<div id="footer">
				<?php include("footer.php"); ?>
			</div>
				
		</div>
	</body>


</html>