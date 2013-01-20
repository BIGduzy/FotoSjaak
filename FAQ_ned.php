<?php
	include("connect_db.php");
	$query = "SELECT `ID`, `Vraag`, `Antwoord` FROM `faq`";
	
	$result = mysql_query($query,$db) or die ("query fout op pagina".$query);
	
	
?>

FAQ NED
<div id='FAQ'>
<table>
	<Tr>
	<th>
		ID
	</th>
	<th>
		Vraag
	</th>
	<th>
		Antwoord
	</th>
	</tr>
	<?php
	while ($row = mysql_fetch_array($result))
	{
	echo			"<tr>
						<td>
							{$row['ID']}
						</td>
						
						<td>
							{$row['Vraag']}
						</td>
						
						<td>
							{$row['Antwoord']}
						</td>
					</tr>";
	}
	?>

</table>
</div>