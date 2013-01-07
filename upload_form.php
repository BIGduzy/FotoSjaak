<?php
	if (isset($_POST['submit']))
	{	echo"De volgende gegevens worden doorgestuurd middels het formulier:<br />
			 Naam van de foto: ".$_FILES['foto']['name'];	
	}
	else
	{
?>
<form action='index.php?content=upload_form' method='POST' enctype='multipart/form-data' >
	<table>
		<tr>
			<td>kies een foto</td>
			<td><input type='file' name='foto' /></td>
		</TR>
		<tr>
			<td>Beschrijving foto</td>
			<td><textarea cols='50' rows='5' name='Beschrijving'></textarea></td>
		</TR>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur'/></td>
		</TR>
	</table>
	<input type='hidden' name='klant-id' value='<?php echo $_GET["customer"]; ?>'/>
	<input type='hidden' name='order-id' value='<?php echo $_GET["order_id"]; ?>'/>
</form>
<?php
}
?>