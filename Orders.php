<?php	require_once("./Class/OrderClass.php"); ?>
<table>
	<form>
		<tr>
			<th>ordernr.</th>
			<th>opdracht</th>
			<th>datum</th>
			<th>aantal</th>
			<th>kleur/zw</th>
			<th>betaald</th>
			<th>bevestigd</th>
			<th>prijs</th>
			<th>upload</th>
			
		</tr>
		<?php echo OrderClass::Find_orders(); ?>
	
		
	</form>
</table>