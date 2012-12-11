<?php
	require_once("MySqlDatabaseClass.php");
	require_once("UserClass.php");
	
	class OrderClass
	{
		//fields
		private $ID;
		private $user_id;
		private $order_short;
		private $order_long;
		private $deliveryDate;
		private $eventDate;
		private $color;
		private $numberOffPicktures;
		private $orderDate;
		private $confirmed;
		private $cost;
		private $paid;
		
		//constructor
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
				$object = new OrderClass();
				$object->ID = $row->ID;
				$object->user_id = $row->user_id;
				$object->order_short = $row->order_short;
				$object->deliveryDate = $row->deliveryDate;
				$object->eventDate = $row->eventDate;
				$object->color = $row->color;
				$object->numberOffPicktures = $row->numberOffPicktures;
				$object->orderDate = $row->orderDate;
				$object->confirmed = $row->confirmed;
				$object->cost = $row->cost;
				$object->paid = $row->paid;
				$object_array[] = $object;
			}
			return $object_array;
		}
		
		public static function insert_into_Order($postarray)
		{
			global $database;
			$query ="INSERT INTO `order`(`ID`,
										`user_id`,
										`order_short`,
										`order_long`,
										`deliveryDate`,
										`eventDate`,
										`color`,
										`numberOffPicktures`,
										`orderDate`,
										`confirmed`, 
										`cost`,
										`paid`)
										VALUES(
										'Null',
										'".$_SESSION['user_id']."',
										'".$postarray['order_short']."',
										'".$postarray['order_long']."',
										'".$postarray['deliveryDate']."',
										'".$postarray['eventDate']."',
										'".$postarray['color']."',
										'".$postarray['numberOffPicktures']."',
										'2012-11-12 14:31:00',
										'no',
										'1234,56',
										'no')";
										
			$database->fire_query($query);
			self::send_orderActivation_Email($postarray);
			echo "Uw opdracht is ontvangen. u krijgt een bevestegingsmail toegestuurd. Nadat u op de <br/>
			befestegings link heeft geklikt is de opdracht definitief";
			header("refresh:4;url=index.php?content=customerHome");
		}
		
		public static function send_orderActivation_Email($postarray)
		{
			$user = UserClass::find_name();
			
			
			$carbonCopy = "sjaakie1984@hotmail.com";
			$blindCarbonCopy ="info@belastingdienst.nl";
			$ontvanger = $Email;
			$onderwerp = "Welcome by FotoSjaak";
			
			$bericht   = "Geachte heer/mevrouw <b>".$user->getField("Tussenvoegsel")." ".$user->getField("Surname")."</b>,<br /> <br />
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
			$headers   .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		
			mail( $ontvanger, $onderwerp, $bericht, $headers);
		}
	}
	

?>