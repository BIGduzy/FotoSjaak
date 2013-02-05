<script type='text/javascript'>
	$('document').ready(function(){
		//alert('Het werkt!');
		/*
		$("button").click(function(){
			waardeAlt = $("img").attr("alt");
			alert(waardeAlt);
			$("img").attr("alt", "dwerghamster");
			waardeAlt = $("img").attr("alt");
			alert(waardeAlt);
		});*/

		$("#1").click(function(){
			$("[id=pict1]").attr("src", "./developer/img/rdhamster.jpg")
						   .attr("alt", "dwerghamster")
						   .attr("width", 200);			
		});

		$("#2").click(function(){
			$("[id=pict1]").attr("src", "./developer/img/kameel.jpg")
						   .attr("alt", "kameel")
						   .attr("width", 200);			
		});

		/*$("#pict1").mouseover(function(){
			if ( $("#pict1").attr("alt") == "kameel")
			{ 				
				alert("U muis gaat over het plaatje van de kameel");
			}
			else if ( $("#pict1").attr("alt") == "dwerghamster")
			{
				alert("U muis gaat over het plaatje van de dwerghamster");
			}
			else
			{
				alert("U staat met de muis op een onbekend plaatje");
			}
		});*/

		$("#3").click(function()
		{
			var width = $("#pict1").attr("width");
			width = parseInt(width);
			width += 20;
			$("#pict1").attr("width", width);
			//alert(width);
		});
		$("#4").click(function()
		{
			var width = $("#pict1").attr("width");
			width = parseInt(width);
			width -= 20;
			$("#pict1").attr("width", width);
			//alert(width);
		});
		
		/*$("#pict1").mouseover(function(){
			var width = $("#pict1").attr("width");
			width = parseInt(width);
			width += 20;
			$("#pict1").attr("width", width);
			});*/
	});
</script>

<p>Plaatjes en attribuut filters</p>
<img id='pict1' src='./developer/img/kameel.jpg' alt='kameel' width='200'/><br />
<button id='1'>show hamster</button>
<button id='2'> show camel </button><br />
<button id='3'>   groter   </button>
<button id='4'>  kleiner  </button>