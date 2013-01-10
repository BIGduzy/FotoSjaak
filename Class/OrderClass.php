<?php
	require_once("MySqlDatabaseClass.php");
	require_once("UserClass.php");
	require_once("LoginClass.php");
	require_once("DateFormatClass.php");
	require_once("DbFormatClass.php");
	
	class OrderClass
	{
		//fields
		private $order_id;
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
				$object->order_id = $row->order_id;
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
			$date = date("Y-m-d H:i:s");
			global $database;
			
			$query ="INSERT INTO `order`(`order_id`,
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
										'".date("Y-m-d",strtotime($postarray['deliveryDate']))."',
										'".date("Y-m-d",strtotime($postarray['eventDate']))."',
										'".$postarray['color']."',
										'".$postarray['numberOffPicktures']."',
										'".$date."',
										'no',
										'1234,56',
										'no')";
										
			$database->fire_query($query);
			$order_ID= mysql_insert_ID();
			self::send_orderActivation_Email($postarray,$order_ID);
			echo "Uw opdracht is ontvangen. u krijgt een bevestegingsmail toegestuurd. Nadat u op de <br/>
			befestegings link heeft geklikt is de opdracht definitief";
			header("refresh:4;url=index.php?content=customerHome");
		}
		
		public static function send_orderActivation_Email($postarray,$order_ID)
		{
			$user = UserClass::find_name();			
			$carbonCopy = "sjaakie1984@hotmail.com";
			$blindCarbonCopy ="info@belastingdienst.nl";
			$ontvanger = LoginClass::find_email($_SESSION['user_id']);
			$password = LoginClass::find_password($_SESSION['user_id']);
			$onderwerp = "Welcome by FotoSjaak";
			
			$bericht   = "Geachte heer/mevrouw <b>".$user->getField("Tussenvoegsel")." ".$user->getField("Surname")."</b>,<br /> <br />
			Uw bestelling is ontvangen, hier onder kunt hem nog een laatste keer bekijken.<br />
			<table>
				<tr>
					<td>Uw id nummer</td>
					<td>".$order_ID."</td>
				</tr>
				<tr>
					<td>Korte omschrijving van de opdracht</td>
					<td>".$postarray['order_short']."</td>
				</tr>
				<tr>
					<td>Uitgebrijde Omschrijving van de opdracht</td>
					<td>".$postarray['order_long']."</td>
				</tr>
				<tr>
					<td>Opleveringsdatum</td>
					<td>".$postarray['deliveryDate']."</td>
				</tr>
				<tr>
					<td>Evenementsdatum</td>
					<td>".$postarray['eventDate']."</td>
				</tr>
				<tr>
					<td>Kleur</td>
					<td>".$postarray['color']."</td>
				</tr>
				<tr>
					<td>Aantal foto's</td>
					<td>".$postarray['numberOffPicktures']."</td>
				</tr>
			</table>
			<br/>
			
			Als uw bestelling helemaal klopt moet u op de onderstaande knop klikken om uw bestelling definitief te plaatsen, als u niet op de link klikt wordt hij binnen 72 uur verwijderd.<br /> <br />
			<a href='http://localhost/2012-2013/Block2/index.php?content=ConfirmOrder&order_id=".$order_ID."&user_name=".$ontvanger."&password=".$password."'>Klik hier om uw bestelling te bevestigen.</a><br />
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
		
		public static function confirm_order($order_ID)
		{
			global $database;
			$query ="UPDATE `order` SET `confirmed` ='yes'
					 WHERE `order_id` =".$order_ID.";";
			$database->fire_query($query);
		}
		
		public static function Find_orders()
		{
			global $database;
			$query = "SELECT * FROM `order`,`user`
					  WHERE `order`.`user_ID` = `user`.`id`
					  ORDER BY `user_ID";
					  
			$result = $database->fire_query($query);
			$rows = "";
			$previous = "";
			while($object = mysql_fetch_object($result))
			{
				//var_dump($object);
				$current = $object->user_id;
				if ($current != $previous)
				{
				$rows .= "<tr>
							<td colspan='5'>id = [".$object->user_id."] "
													.$object->Firstname." "
													.$object->Tussenvoegsel." "
													.$object->Surname."
							</td>
						  </tr>";
				}
				$previous = $current;
				
				$rows .= "<tr>
						<td>".$object->order_id."</td>
						<td>".$object->order_short."</td>
						<td>
							Oplevering: ".DateFormat::change($object->deliveryDate)."<br />
							Eventdatum: ".DateFormat::change($object->eventDate)."<br />
							Plaatsing:  ".DateFormat::change($object->orderDate)."<br/>
						</td>
						<td>".$object->numberOffPicktures."</td>
						<td>".DbFormat::translate_color($object->color)."</td>
						<td>".DbFormat::translate_confirmed($object->confirmed)."</td>
						<td>".DbFormat::translate_paid($object->paid)."</td>
						<td>".$object->cost."</td>
						<td>
							<a href='index.php?content=upload_form&
													customer={$object->user_id}&
													order_id={$object->order_id}'>
								<img src='css/marker.png' alt='upload' />
							</a>
						</td>
					  </tr>";
			}
			return $rows;
		}
		
	}
	

?>