<?php

	require_once("class/MySqlDatabaseClass.php");
	require_once("class/LoginClass.php");
	
	
	$query ="INSERT INTO `Login`( `ID`,
								   `Username`,
								   `Password`,
								   `Userrole`,
								   `Activated`)
					VALUES		( NULL,
								'Sjaak@live.nl',
								'123',
								'Sjaak',
								'Yes')";
	
	//$database->fire_query($query);
	
	
	LoginClass::find_all();
 ?>
dit is een test.