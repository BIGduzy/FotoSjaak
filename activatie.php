<?php
	require_once("./class/LoginClass.php");
	
	
	
	if (isset($_POST['submit']))
	{
		if (!strcmp($_POST['wachtwoord'], $_POST['wachtwoord-check']))
		{
			LoginClass::Update_password($_POST['Email'], $_POST['wachtwoord']);
			echo "Uw wachtword is succesvol geweizicht. U wordt door gestuurd naar<br />
			onze start pagina";
			header("refresh:3;url=index.php");
		}
		else
		{
			echo"De ingevoerden wachtwoorden komen neit overeen.<br />
				probeer het opnieuw.";
			header("refresh:3;url=index.php?content=activatie&em=".$_POST['Email']."&pw=".$_POST['Oldpw']);
		}
		
	}
	else
	{
		if (LoginClass::check_email_password_exists($_GET['em'],$_GET['pw']))
		{

?>
	Uw account wordt geactiveerd nadat u <br />
	een nieuw wachtwoord heeft gekozen.
	<form action='index.php?content=activatie' method='post'>
		<table>
			<tr>
				<td>wachtwoord</td>
				<td><input type='password' name='wachtwoord' size=16 maxlength=16 /></td>
			</tr>
			<tr>
				<td>bevestig wachtwoord</td>
				<td><input type='password' name='wachtwoord-check' size=16 maxlength=16/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='submit' value='verstuur'/>
					<input type='hidden' name='Email' value='<?php echo $_GET['em']; ?>'</td>
					<input type='hidden' name='Oldpw' value='<?php echo $_GET['pw']; ?>'</td>
				
			</tr>
		</table>
	</form>

<?php
}
else
{
	echo "u heeft geem rechten tot deze pagina.";
	header("refresh:3;index.php");
}
}
?>
