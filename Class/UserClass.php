<?php
	require_once("./Class/MySqlDatabaseClass.php");
	
	class UserClass
	{
		//fields
		private $ID;
		private $Firstname;
		private $Tussenvoegsel;
		private $Surname;
		private $Address;
		private $Addressnumber;
		private $City;
		private $Zipcode;
		private $Country;
		private $Tel;
		private $Mtel;
		
		//property
		public function getField($name)
		{
			return (property_exists(__CLASS__,$name)) ?	$this->$name : NULL;
		}
		
		public function setField($name, $value)
		{
			if (property_exists(__CLASS__,$name))
			{
				$this->$name = $value;
			}
		}
	
	public static function find_by_sql($query)
		{
			global $database;
			//echo $query; exit();
			$result = $database->fire_query($query);
			//print_r(mysql_fetch_object($result)); exit();
			$object_array=array();
			
			while ( $row = mysql_fetch_object($result))
			{
				$object = new UserClass();
				$object->ID = $row->ID;
				$object->Firstname = $row->Firstname;
				$object->Tussenvoegsel = $row->Tussenvoegsel;
				$object->Surname = $row->Surname;
				$object->Address = $row->Address;
				$object->Addressnumber = $row->Addressnumber;
				$object->City = $row->City;
				$object->Zipcode = $row->Zipcode;
				$object->Country = $row->Country;
				$object->Tel = $row->Tel;
				$object->Mtel = $row->Mtel;
				$object_array[] = $object;
			}
			return $object_array;
		}
		
	public static function find_name()
	{
		$query ="SELECT * FROM `user`
				WHERE `ID` = '".$_SESSION['user_id']."'";
		$user= array_shift(self::find_by_sql($query));
		return $user;
	}
	}
?>