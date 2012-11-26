<?php
require_once("class/LoginClass.php");
if (isset($_POST['submit']))
{
	//code om gegevens op te slaan.
	if (LoginClass::Email_exists($_POST['Email']))
	{
		echo "Dit emailadres bestaat al. u wordt terug gestuurd";
		header("refresh:4;url=index.php?content=register");
	}
	else
	{
		LoginClass::insert_into_login($_POST);
		echo"Uw bent succesvol geregistreed.<br />
			 u zal binnen enkele minuten een activatiemail ontvangen.";
			 header("refresh:3;url=index.php?content=home");
	}
}
else
{
?>

<form action='index.php?content=register' method='POST'>
	<table>
		<tr>
			<td>Firstname</td>
			<td><input type='text' name='Firstname'/> </td>
		</tr>
		<tr>
			<td>Tussenvoegsel</td>
			<td><input type='text' name='Tussenvoegsel'/> </td>
		</tr>
		<tr>
			<td>Surname</td>
			<td><input type='text' name='Surname'/> </td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type='text' name='Address'/> </td>
		</tr>
		<tr>
			<td>Addressnumber</td>
			<td><input type='text' name='Addressnumber'/> </td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type='text' name='City'/> </td>
		</tr>
		<tr>
			<td>Zipcode</td>
			<td><input type='text' name='Zipcode'/> </td>
		</tr>
		<tr>
			<td>Country</td>
			<td><input type='text' name='Country'/> </td>
		</tr>
		<tr>
			<td>Tel</td>
			<td><input type='text' name='Tel'/> </td>
		</tr>
		<tr>
			<td>Mtel</td>
			<td><input type='text' name='Mtel'/> </td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='Email'/> </td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type='submit' name='submit'/> </td>
		</tr>
		
	</table>
</form>
<?php
}
?>