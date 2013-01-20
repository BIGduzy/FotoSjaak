<?php 
 require_once("class/PhotoClass.php");
?>
<p>De foto's:</p>
<table border='1'>
	<?php PhotoClass::show_photos($_GET['user_id'], $_GET["order_id"]); ?>
</table>