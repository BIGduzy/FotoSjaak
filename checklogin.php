<?php
	require_once("./class/LoginClass.php");
	require_once("./class/SessionClass.php");

	if ( !empty($_POST['Username']) && !empty($_POST['Password']) )
	{
			if (LoginClass::check_email_password_exists($_POST['Username'],$_POST['Password']))
			{
				if (LoginClass::check_activated($_POST['Username']))
				{
					$session->login(LoginClass::find_user($_POST));
					echo $_SESSION['user_id'];
					/*
					$record = mysql_fetch_array($result);
					switch($record["Rol"])
					{
						case 'Customer':
						$_SESSION['ID'] = $record['ID'];
						$_SESSION['Rol'] = 'klant';
							header('location:index.php?content=customer');
							break;
							
						case 'Sjaak':
						$_SESSION['ID'] = $record['ID'];
						$_SESSION['Rol'] = 'admin';
							header('location:index.php?content=admin');
							break;
							
						case 'Root':
						$_SESSION['ID'] = $record['ID'];
						$_SESSION['Rol'] = 'beheerder';
							header('location:index.php?content=gebruiker');
							break;
							
						default:
							header('location:index.php?content=login');
							break;
					}*/
				
				}
				else
				{
					echo"uw account is nog niet geactiveerd. u heeft een mail ontvangen met een activatie link.<br />
					u wordt door gestuurd naar de login pagina.";
					header("refrsh:3;index.php?content=login");
				}
			}	
			else
			{
				echo"de opgegeven combinatie van uw email en wachtwoord is niet goed.
				u word terug gestuurd";
				header('refresh:4;url=index.php?content=login');
			}
	}
	else
	{
	echo'Gebruikersnaam of wachtword niet ingevult.<br />
		u wordt doorgestuurd naar de login.
		<meta http-equiv="refresh" content="3;url=index.php?content=login" />';
	
	}

?>