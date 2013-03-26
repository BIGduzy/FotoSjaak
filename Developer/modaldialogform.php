<h3>Dit is een modaal dialoog formulier</h3>
<?php 
	if ( isset($_POST['submit'] ))
	  {
		require_once("./class/MySqlDatabaseClass.php");
		$query = "INSERT INTO `testuser` (`id`, `name`, `infix`, `surname`)
								VALUES	 (null,
										  '".$_POST['name']."',
										  '".$_POST['infix']."',
										  '".$_POST['surname']."')";
		global $database;
		$database->fire_query($query);
	  }
?>
<style>

</style>
<script type='text/javascript'>
	
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#1').click(function(){
						$('#dialog').dialog('open');
					  });
		$("#dialog").dialog({ width: 350,
							  autoOpen: false,
							  modal: true
							});
	});

	
	
</script>

<button id='1'>create new user</button>
<div id='dialog'>
	<table> <!-- -->
		<form action='index.php?content=developer/modaldialogform' method='post'>
			<tr>
				<td>voornaam</td>
				<td><input type='text' name='name' /></td>
			</tr>
			<tr>
				<td>tussenvoegsel</td>
				<td><input type='text' name='infix' /></td>
			</tr>
			<tr>
				<td>achternaam</td>
				<td><input type='text' name='surname' /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='' /></td>
			</tr>
		</form>
	</table>
</div>