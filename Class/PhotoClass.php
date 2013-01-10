<?php
	require_once("Class/MySqlDatabaseClass.php");
	define('NUMBER_OF_PHOTO',10);
	class PhotoClass
	{
		//FIELDS
		private $photo_id;
		private $order_id;
		private $photo_name;
		private $photo_text;
		
		
		public static function find_by_sql($query)
		{
			global $database;
			//echo $query; exit();
			$result = $database->fire_query($query);
			//print_r(mysql_fetch_object($result)); exit();
			$object_array=array();
			
			while ( $row = mysql_fetch_object($result))
			{
				$object = new PhotoClass();
				$object->photo_id = $row->photo_id;
				$object->order_id = $row->order_id;
				$object->photo_name = $row->photo_name;
				$object->photo_text = $row->photo_text;
				$object_array[] = $object;
			}
			return $object_array;
		}
		
		public static function insert_into_photo($order_id,$photo_name,$photo_text)
		{
			global $database;
			$query = "INSERT INTO `photo`	(`photo_id`,`order_id`,`photo_name`,`photo_text`)
											VALUES
											(Null,'{$order_id}','{$photo_name}','{$photo_text}')";
			$database->fire_query($query);
		}
		
		
		public static function show_photos($user_id,$order_id)
		{
			$query = "SELECT * FROM `photo` WHERE `order_id` = '{$order_id}'";
			$result = self::find_by_sql($query);
			$i=0;
			echo "<tr>";
			foreach($result as $photo)
			{
				if ($i != NUMBER_OF_PHOTO)
				{
					echo "	<td>
								<img src='./fotos/{$user_id}/{$order_id}/thumbnail/tn_{$photo->photo_name}' alt='tn_{$photo->photo_name}' />
								<div>
									{$photo->photo_text}
								</div>
							</td>";
					$i++;
				}
				else
				{
					echo "	<tr></tr>
							<td>
								<img src='./fotos/{$user_id}/{$order_id}/thumbnail/tn_{$photo->photo_name}' alt='tn_{$photo->photo_name}' />
								<div>
									{$photo->photo_text}
								</div>
							</td>";
					$i=0;
				}
			}
			echo"</tr>";
			
		}
	}
?>