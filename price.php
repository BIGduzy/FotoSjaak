<?php
	require_once("./Class/OrderClass.php");
	
	if (isset($_POST['submit']))
	{
		OrderClass::update_cost_by_id($_POST['order_id'],$_POST['pricetag']);
	}
	else
	{
?>

<table>
	<caption>full een pijs in</caption>
	<form action='index.php?content=price' method='POST'/>
		<tr>
			<td><input type='text' name='pricetag'/></td>	
		</tr>
		<tr>
			<td><input type='submit' name='submit' value='verstuur' /></td>		
		</tr>
		<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"]; ?>' />
		<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"]; ?>' />
		
		
	</form>
</table>
<?php
}
?>