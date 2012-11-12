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
	}
?>