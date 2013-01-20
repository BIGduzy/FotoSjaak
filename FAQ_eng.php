<?php
	include("connect_db.php");
	$query = "SELECT `ID`, `Question`, `Answere` FROM `faq`";
	
	$result = mysql_query($query,$db) or die ("query fout op pagina".$query);
	
	
?>

FAQ eng
<div id='FAQ'>
<table>
	<Tr>
	<th>
		ID
	</th>
	<th>
		Question
	</th>
	<th>
		Answere
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
							{$row['Question']}
						</td>
						
						<td>
							{$row['Answere']}
						</td>
					</tr>";
	}
	?>

</table>
</div>