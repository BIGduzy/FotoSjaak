<?php
	require_once("./class/LoginClass.php");
	
	
	if (isset($_POST['submit']))
	{
		if (!strcmp($_POST['wachtwoord'], $_POST['wachtwoord-check']))
		{
			LoginClass::Update_password($_POST['Email'], $_POST['wachtwoord']);
		}
		else
		{
			echo"whuuuuuuuuuuuuuuuut?";
		}
		
	}
	else
	{
?>
	welkom op de site. Uw account wordt geactiveerd nadat u <br />
	een nieuw wachtwoord heeft gekozen.
	<form action='activatie.php' method='post'>
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
				
			</tr>
		</table>
	</form>

<?php
}
?>
