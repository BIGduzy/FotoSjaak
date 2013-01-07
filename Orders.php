<?php	require_once("./Class/OrderClass.php"); ?>
<table>
	<form>
		<tr>
			<th>Opdracht</th>
			<th>Datum</th>
			<th>Aantal</th>
			<th>Kleur/Zwart-wit</th>
			<th>bevestigd</th>
			<th>betaald</th>
		</tr>
		<?php echo OrderClass::Find_orders(); ?>
	
		
	</form>
</table>