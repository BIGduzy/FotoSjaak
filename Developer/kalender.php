<h3>Datepicker</h3>
<script type='text/javascript'>
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#datepicker').datepicker({dateFormat: 'dd-mm-yy',
									 autoSize: true,
									 showWeek: true});
	});
</script>

<?php 
	if ( isset($_POST['submit'] ))
	{
		echo "De gekozen datum is: ".$_POST['date'];
		echo "<a href='index.php?content=developer/kalender'><button>terug naar form</button></a>";
	}
	else
	{
?>
<form action='index.php?content=developer/kalender' method='post' >
	<table>
		<tr>
			<td><input type='text' name='date' id='datepicker' /><td>
		</tr>
		<tr>
			<td><input type='submit' name='submit' value='verstuur' /></td>
		</tr>
	</table>
</form>
<?php
	}
?>