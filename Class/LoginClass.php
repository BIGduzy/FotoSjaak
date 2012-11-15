<?php
	require_once("MySqlDatabaseClass.php");
	class LoginClass
	{
		//fields
		private $ID;
		private $Username;
		private $Password;
		private $Userrole;
		private $Activated;
		
		//Constructor
		public function __construct()
		{
		}
		
		public static function find_by_sql($query)
		{
			global $database;
			$result = $database->fire_query($query);
			$object_array=array();
			
			while ( $row = mysql_fetch_object($result))
			{
				$object=new LoginClass();
				$object->ID = $row->ID;
				$object->Username = $row->Username;
				$object->Password = $row->Password;
				$object->Userrole = $row->Userrole;
				$object->Activated = $row->Activated;
				$object_array[] = $object;
			}
			return $object_array;
		}
		
		public static function find_all()
		{
			$query = "SELECT * FROM `login`";
			$result = self::find_by_sql($query);
			foreach($result as $value)
			{
				 echo $value->ID." | ".
					  $value->Username." | ".
				      $value->Password." | ".
				      $value->Userrole." | ".
				      $value->Activated." | ".
				      "<br />";
			}
			
		}
		
		public static function Email_exists($Email)
		{
			global $database;
			$query = "SELECT * FROM `login` WHERE `username` = '".$Email."'";
			$result = $database->fire_query($query);
			return (mysql_num_rows($result) >0) ? true : false;
			
		}
		
		public static function insert_into_login($postarray)
		{
			global $database;
			//de datum
			date_default_timezone_set("Europe/Amsterdam");
			$date  = date("y-m-d H:i:s");
			// MD5 hash van email en datum/tijd.
			$temp_password = MD5($date.$postarray['Email']);
			
			
			$query = "INSERT INTO `login`(
											`ID`,
											`Username`,
											`Password`,
											`Userrole`,
											`Activated`,
											`Datum`)
									VALUES(
											Null,
											'".$postarray['Email']."',
											'".$temp_password."',
											'Customer',
											'No',
											'".$date."')";
											
			$database->fire_query($query);
			
			$query ="SELECT `ID` FROM `login` WHERE Username ='".$postarray['Email']."'";
			echo array_shift(self::find_by_sql($query))->ID;
			$query = "INSERT INTO `user` (`ID`,
										  `Firstname`,
										  `Tussenvoegsel`,
										  `Surname`,
										  `Address`,
										  `Addressnumber`,
										  `City`,
										  `Zipcode`,
										  `Country`,
										  `Tel`,
										  `Mtel`)
									VALUES
										 ('".$ID."',
										  '".$postarray['Firstname']."',
										  '".$postarray['Tussenvoegsel']."',
										  '".$postarray['Surname']."',
										  '".$postarray['Address']."',
										  '".$postarray['Addressnumber']."',
										  '".$postarray['City']."',
										  '".$postarray['Zipcode']."',
										  '".$postarray['Country']."',
										  '".$postarray['Tel']."',
										  '".$postarray['Mtel']."')";
			//echo $query;
			$database->fire_query($query);
		}
		
		
		
	}
?>