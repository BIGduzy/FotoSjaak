<?php
$database=0;
switch ($database)
{
	case 0:
			//lockalhost
			define("SERVERNAME",'localhost');
			define("USERNAME",'root');
			define("PASSWORD",'');
			define("DATABASE",'FotoSjaakDB');
			date_default_timezone_set("Europe/Amsterdam");
	break;
	case 1:		
			//00webhost
			define("SERVERNAME",'');
			define("USERNAME",'');
			define("PASSWORD",'');
			define("DATABASE",'');
	break;
	default:
		break;
}
?>