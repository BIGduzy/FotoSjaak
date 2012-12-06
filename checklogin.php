<?php
	require_once("./class/LoginClass.php");
	require_once("./class/SessionClass.php");

	if ( !empty($_POST['Username']) && !empty($_POST['Password']) )
	{
			if ( LoginClass::check_email_password_exists($_POST['Username'], $_POST['Password']) )
			{
				
				//echo LoginClass::check_if_activated($_POST['Username']);exit();
				if ( LoginClass::check_if_activated($_POST['Username']) )
				{
					$session->login(LoginClass::find_user($_POST));
					
					switch ($_SESSION['user_role'])
					{
						case 'Customer':
							header("location: index.php?content=customerHome");
						break;
						
						case 'Root':
							header("location: index.php?content=rootHome");
						break;
						
						case 'Sjaak':
							header("location: index.php?content=sjaakHome");
						break;
						
						case 'Developer':
							header("location: index.php?content=developerHome");
						break;
						
						default:
							header("location: index.php?content=hackerPage");
						break;
					}
					
					
					
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