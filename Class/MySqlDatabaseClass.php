<?php
	//include 
	require_once('Config/config.php');

	//Dit is de class definitie van de MySqlDatabase Class.
	class MySqlDatabaseClass
	{
		//fields
		private $db_connection;
		
		//Constructor
		public function __construct()
		{
			// hier wordt contact met de mysql-server gemaakt.
			$this->db_connection = mysql_connect(SERVERNAME,USERNAME,PASSWORD)
				or die('MySqlDatabaseClass: '.mysql_error());
			
			//hier wordt de database geselecteerd.
			mysql_select_db(DATABASE,$this->db_connection)
				or die ('MySqlDatabaseClass: '.mysql_error());
		}
		
		public function fire_query( $query)
		{
			//hier wordt de query naar de database gestuurd/afgevuurd.
			$result = mysql_query($query,$this->db_connection)
				or die ('MySqlDatabaseClass: '.mysql_error());
			return $result;
		}
	}
	// hier wordt een instantie van de class gemaakt.
	$database = new MySqlDatabaseClass();
?>