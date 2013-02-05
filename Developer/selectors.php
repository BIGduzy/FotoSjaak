<script type='text/javascript' >
 <!-- $("document") is een jquery-object en we roepen de methode ready aan met een . (dot-notatie-->
 $("document").ready(function(){
	//alert("De pagina is geladen");
	//Dit is een jquery selectors
	$("#selectors, #selectors li, #selectors li.opmaak_on").css("font-family", "Arial");
	$("#selectors").css("border", "1px solid RGBA(240,240,240,1.0)")
				   .css("background-color", "RGBA(200,200,200,1.0)")
				   .css("list-style-type", "none")
				   .css("width", "12em")
				   .css("font-size", "0.8em");
	$("#selectors li").css("padding-left", "1em");			   
	$("#selectors li.opmaak_on").css("background-color", "RGB(240,240,240,1.0)")
								.css("width", "10em");
	//Selecteer alle tages met class='opmaak_on' waarvoor geldt dat de parent tag een ul tag is
	//$("ul > .opmaak_on").css("border", "2px solid green");
	//Selecteert een p.red tag als die vlak achter een ul staat
	//$("ul + p.red").css("border", "1px solid red");
	//Alles selecteren
	//$("*").css("border", "4px solid green");
	//Selecteer op het attribute class
	//$("[class=red]").css("border", "2px solid purple");
	//$("[id=selectors]").css("border", "2px solid pink");
	//Selecteert een tag met als attrbuut class die als waarde opmaak in zich heeft
	//$("[class~=opmaak_on]").css("border", "2px solid yellow");
	$("[class|=opmaak]").css("border", "2px solid yellow");
 }); 
 //alert("De pagina is nog niet geladen");
</script>
<p>Jquery voorbeeld voor selectors</p>
<ul id='selectors'>
	<li class='opmaak_on'>eerste item</li>
	<li>tweede item</li>
	<li class='opmaak_on'>derde item</li>
	<li>vierde item</li>
	<li class='opmaak_on'>vijfde item</li>
</ul>
<p class='red'>Eerste paragraaf</p>
<p class='red'>tweede paragraaf</p>
<p class='opmaak_on'>derde paragraaf</p>
<p class='red'>vierde paragraaf</p>
<p>vijfde paragraaf</p>