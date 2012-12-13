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
		
		//properties
		public function getID() { return $this->ID;}
		public function getUsername() { return $this->Username;}
		public function getUserrole() { return $this->Userrole;}
		//Constructor
		public function __construct()
		{
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
				$object = new LoginClass();
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
			
			$query ="SELECT * FROM `login` WHERE `Username` ='".$postarray['Email']."'";
			//echo $query; exit();
			$ID = array_shift(self::find_by_sql($query))->ID;
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
			self::send_activation_Email($postarray['Tussenvoegsel'], $temp_password, $postarray['Surname'], $postarray['Email']);
		}
		
		public static function send_activation_Email($Tussenvoegsel, $Password, $Surname, $Email)
		{
			$carbonCopy = "sjaakie1984@hotmail.com";
			$blindCarbonCopy ="info@belastingdienst.nl";
			$ontvanger = $Email;
			$onderwerp = "Welcome by FotoSjaak";
			
			//plain bericht
			/*$bericht   = "Geachte heer/mevrouw ".$Tussenvoegsel." ".$Surname.",\r\n \r\n
			voor dat u kan inloggen moet u account nog worden geactiveerd.
			klik hier voor op de onderstaandelink.\r\n
			http://localhost/2012-2013/block2/activatie.php?em=".$Email."&pw=".$Password."\r\n
			Met vriendelijke groet, \r\n
			\r\n
			Sjaak \r\n";*/
			
			
			//html bericht
			$bericht   = "Geachte heer/mevrouw <b>".$Tussenvoegsel." ".$Surname."</b>,<br /> <br />
			voor dat u kan inloggen moet u account nog worden geactiveerd.<br />
			klik hier voor op de onderstaandelink.<br /> <br />
			<a href='http://localhost/2012-2013/block2/index.php?content=activatie&em=".$Email."&pw=".$Password."'>activeer account</a><br />
			Met vriendelijke groet, <br />
			<br />
			Sjaak <br />";
			
			$headers   = "From: info@fotosjaak.nl\r\n";
			$headers   .= "Reply-To: info@fotosjaak.nl";
			$headers   .= "Cc: ".$carbonCopy."\r\n";
			$headers   .= "Bcc: ".$blindCarbonCopy."\r\n";
			$headers   .= "X-mailer: PHP/".phpversion()."\r\n";
			$headers   .= "MINE-version: 1.0\r\n";
			//$headers   .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
			$headers   .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		
			mail( $ontvanger, $onderwerp, $bericht, $headers);
		}
		
		public static function Update_password($Email, $password)
		{
			global $database;
			$query = "UPDATE `login`
					 SET `Password`='".$password."',
						 `Activated` = 'Yes'
					 WHERE `Username` = '".$Email."'";
			//echo $query; exit();	 
			$database->fire_query($query);
		}
		
		public static function check_email_password_exists($Email,$password)
		{
			$query ="SELECT * FROM `login`
					 WHERE `Username` = '".$Email."'
					 AND `Password` ='".$password."'";
			$record=self::find_by_sql($query);
			//ternary operator
			return (sizeof($record) >0) ? true : false;
			
		}
		
		 public static function check_if_activated($Email)	
		 {	
			$query = "SELECT * FROM `login`	
								WHERE `Username` = '".$Email."'";	
			$record = self::find_by_sql($query);
			//var_dump($record);exit();
			//Ternary operator, als het account is geactiveerd return true, anders false
			return ($record[0]->Activated == 'Yes') ? true : false; 	
		}
		
		public static function find_user($postarray)
		{
			$query ="SELECT * FROM `login` WHERE
			`Username` = '".$postarray['Username']."'
			and `Password` = '".$postarray['Password']."'";
			$user_array = self::find_by_sql($query);
			$user = array_shift($user_array);
			return $user;
		}
		
		public static function find_email($ID)
		{
			$query =" SELECT * FROM `login` WHERE `ID` = '".$ID."'";
			$user = self::find_by_sql($query);
			$user = array_shift($user);
			return $user->Username;
		}
		
		public static function find_password($ID)
		{
			$query =" SELECT * FROM `login` WHERE `ID` = '".$ID."'";
			$user = self::find_by_sql($query);
			$user = array_shift($user);
			return $user->Password;
		}
	}
?>