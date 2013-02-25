
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
							<a href='index.php?content=order_customer'>Geplaatste opdrachten</a>
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
				
				case 'Developer':
					echo"
					<div id=test>
					<a href='index.php?content=developer/selectors'>selector</a>
					<a href='index.php?content=developer/image-attributes'>image</a>
					<a href='index.php?content=developer/inserting'>inserting</a>
					<a href='index.php?content=developer/addClass'>addClass</a>
					<a href='index.php?content=developer/sliding'>sliding</a>
					<a href='index.php?content=developer/animate'>animate</a>
					<a href='index.php?content=developer/image_rotator'>image_rotator</a>
					</div>
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


