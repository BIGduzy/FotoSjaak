addclass<style>
.odd
{
	background-color :pink;
    border :1px solid red;
	font-size:1em;
}

.even
{
	background-color:yellow;
	border:1px solid black;
	font-size:1em;
}

.highlight
{
	background-color:grey;
	border:1px solid black;
	font-size:1em;
}

</style>
<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		$("tr:even").addClass("even");
		$("tr:odd").addClass("odd");
		$("tr").hover(
			function(){
				$(this).toggleClass('highlight');
			},
			function(){
				$(this).toggleClass('highlight');
			}
		);
	});
</script>
<table>
	<tr>
		<th>id</th>
		<th>voornaam</th>
		<th>tussenvoegsel</th>
		<th>achternaam</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Nick</td>
		<td></td>
		<td>Bout</td>	
	</tr>
	<tr>
		<td>2</td>
		<td>Bert</td>
		<td>de</td>
		<td>Vries</td>	
	</tr>
	<tr>
		<td>3</td>
		<td>Johan</td>
		<td>de</td>
		<td>Bree</td>	
	</tr>
	<tr>
		<td>4</td>
		<td>Kees</td>
		<td>de</td>
		<td>Jong</td>	
	</tr>
</table>