<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		//$("tr:first").css("background-color", "RGB(220, 220, 220)");
		//$("tr:last").css("background-color", "RGB(220, 220, 220)");
		//$("tr:even").css("background-color", "RGB(220, 220, 220)");
		//$("tr:odd").css("background-color", "RGB(220, 220, 220)");
		//$("tr:eq(4)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:not(tr:eq(2))").css("background-color", "RGB(220, 220, 220)");
		//$("tr:gt(2)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:not(tr:gt(2))").css("background-color", "RGB(220, 220, 220)");
		//$("tr:lt(2)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:nth-child(2n+1)").css("background-color", "RGB(220, 220, 220)");

		$("tr").css("background-color", "RGB(220, 220, 220)");
		$("tr").click(function(){
			$(this).css("background-color", "RGB(200, 200, 200)");
		});

		$("tr:not(tr:eq(0))").hover(function(){
			$(this).css("background-color", "RGB(200, 200, 200)");
			$(this).css("font-size", "1.2em");
		},
		function(){
			$(this).css("background-color", "RGB(220, 220, 220)");
			$(this).css("font-size", "1em");
		});
	});
</script>

<table>
	<tr>
		<th>ID</th>
		<th>voornaam</th>
		<th>tussenvoegsel</th>
		<th>achternaam</th>
	</tr>
	<tr>
		<th>1</th>
		<th>Nick</th>
		<th></th>
		<th>Bout</th>
	</tr>
	<tr>
		<th>2</th>
		<th>Dave</th>
		<th></th>
		<th>Janaat</th>
	</tr>
	<tr>
		<th>3</th>
		<th>Bob</th>
		<th></th>
		<th>Thomas</th>
	</tr>
	<tr>
		<th>4</th>
		<th>Wouter</th>
		<th></th>
		<th>Dijkstra</th>
	</tr>
</table>