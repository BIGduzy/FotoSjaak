modaldialogform
<?php
	if (isset($_POST['submit']))
	{
		require_once("Class/MySqlDatabaseClass.php");
		$query = "INSERT INTO"
	}
?>

<script type='text/javascript'>
	$('document').ready(function(){
		//alert("test");
		$('#2').click(function(){
				  $('#dialog').dialog('open');
				});
		$('#dialog').dialog({width : 350,
							 autoOpen: false,
							 modal: true
									});
	});
</script>

<button id='2'>create user</button>
<div id='dialog'>
	<table>
		<form action='index.php?content=developer/modaldialogform' method='post'>
			<tr>
				<td>voornaam</td>
				<td><input type='text' name='name' /></td>
			</tr>
			<tr>
				<td>tussenvoegsel</td>
				<td><input type='text' name='tussenvoegsel' /></td>
			</tr>
			<tr>
				<td>achternaam</td>	
				<td><input type='text' name='surname' /></td>
			</tr>
			<tr>
				<td><input type='submit' name='submit' /></td>
			</tr>
		</form>
	</table>
</div>