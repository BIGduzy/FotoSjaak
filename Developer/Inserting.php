<style>
	img
	{
		width:250px;
		hight:200px;
	}
	
	p
	{
		background-color:white;
	}
</style>

<script type='text/javascript'>
	$("document").ready(function(){
		//alert("test");
		$("#1").click(function()
		{
			/*$("div.foto p ").append(",(dit is een echte ninja)")
							.prepend("Pas op ")
							.after("<p>Dit komt na de tekst</p>")
							.before("<p> dit komt voor de tekst</p>");*/
			//$("div.foto img").before("<br /><p id='onder'>hieronder staat een ninja hamster</p>");
			//$("p#onder").insertAfter("img");
			$("div.foto:first").insertAfter("div.foto:last");
		});
	});
</script>
	<p>oefenen met jquery invoegen van tekst</p>
<div class='foto'>
	<img src='./developer/img/rdhamster.jpg' alt='' />
	<p>dit is een hamster</p>
</div>
<div class='foto'>
	<img src='./developer/img/ninjahamster.jpg' alt='' />
	<p>dit is zijn broer</p>
</div>
<button id="1">voeg tekst toe</button>