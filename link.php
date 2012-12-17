
	<?php
		if ( isset($_SESSION['user_role']))
		{
			
			switch ($_SESSION['user_role'])
			{
				case 'Customer':
					echo"
							<a href='index.php?content=customerHome'> home</a>
							<a href='index.php?content=logout'>uitloggen</a>
							<a href='index.php?content=opdracht'>Opdracht plaatsen</a>
							<a href='index.php?content=FAQ_ned'>FAQ</a>";
				break;
				
				case 'Sjaak':
						echo"
							<a href='index.php?content=logout'>uitloggen</a>
							<a href='index.php?content=Orders'>Opdrachten</a>";
				break;
				
				case 'Root':
						echo"
							<a href='index.php?content=logout'>uitloggen</a>";	 
				break;
				
				case 'Deceloper':
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


