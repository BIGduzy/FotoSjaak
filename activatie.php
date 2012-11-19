<?php
	echo "gebruikersnaam: ".$_GET['em']."<br />";
	echo "gebruikersnaam: ".$_GET['pw']."<br />";
?>
	welkom op de site. Uw account wordt geactiveerd nadat u <br />
	een nieuw wachtwoord heeft gekozen.
	<form action='' method=''>
		<table>
			<tr>
				<td>wachtwoord</td>
				<td><input type='password' name='wachtwoord'/></td>
			</tr>
			<tr>
				<td>bevestig wachtwoord</td>
				<td><input type='password' name='wachtwoord-check'/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='submit' value='verstuur'/></td>
			</tr>
		</table>
	</form>
	
