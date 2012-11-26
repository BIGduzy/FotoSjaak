	<a href='index.php?content=home'> home</a>
	<?php
		if ( isset($_SESSION['Rol']))
		{
			
			switch ($_SESSION['Rol'])
			{
				case 'Custommer':
					echo"
							<a href='index.php?content=logout'>uitloggen</a>
							<a href='index.php?content=FAQ_ned'>FAQ</a>";
				break;
				
				case 'Sjaak':
						echo"
							<a href='index.php?content=logout'>uitloggen</a>";
				break;
				
				case 'Root':
						echo"
							<a href='index.php?content=logout'>uitloggen</a>";	 
				break;
				
				default:
				break;
		}
		}
		else
		{
			echo"
			<a href='index.php?content=register'>register</a>
			<a href='index.php?content=login'>login</a>";
		}
	
	?>


