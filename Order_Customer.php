<?php	require_once("./Class/OrderClass.php"); ?>
<p>Klik op de prijs op deze te bevestigen.</p>
<table>
	<form>
		<tr>
			<th>Ordernr.</th>
			<th>Opdracht</th>
			<th>Datum</th>
			<th>Aantal</th>
			<th>Kleur/Zwart-wit</th>
			<th>bevestigd</th>
			<th>betaald</th>
			<th>prijs</th>
			<th>prijs_OK</th>
		</tr>
		<?php echo OrderClass::Find_order_by_id(); ?>
	
		
	</form>
</table>