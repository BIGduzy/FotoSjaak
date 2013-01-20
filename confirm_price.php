<?php
	require_once("Class/OrderClass.php");
	
	if (isset($_POST['submit']))
	{
	OrderClass::confirm_cost_by_order_id($_POST['order_id']);
	}
	else
	{
?>

Als u op de knop drukt gaat u akkoord met het onderstaande bedrag:
Bedrag: <?php echo $_GET['cost']; ?> euro

<form action='index.php?content=confirm_price' method='POST'>
	<input type='submit' name='submit' value='akkoord' />
	<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"]; ?>' />
</form>
<?php
}
?>