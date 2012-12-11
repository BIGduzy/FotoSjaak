<?php
	require_once("MySqlDatabaseClass.php");
	
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
			echo "Uw opdracht is ontvangen. u krijgt een bevestegingsmail toegestuurd. Nadat u op de <br/>
			befestegings link heeft geklikt ";
		}
	}
	

?>