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
	//Selecteert een tag met als attrbuut class die als waarde opmaak heeft of als losstaand woord staat.
	//$("[class~=opmaak]").css("border", "1px solid yellow");
	//Als een class attribuut begint met het woord opmaak en gevolgd wordt door een hyphen (-) wordt het element geselecteerd
	//$("[class|=opmaak]").css("border", "2px solid yellow");
	//Selecteert een element met een attribuutwaarde van aak- dat zich bevindt in de waarde van het classattribuut.
	//$("[class*=aak-]").css("border", "2px solid pink");
	//Attribuut class moet beginnen met r45Y
	//$("[class^=r45Y]").css("border", "6px solid brown");
	//Attribuut moet eindigen op de waarde 34Y5T
	//$("[class$=34Y5T]").css("border", "3px solid yellow");
	//Selecteer alle p tags die niet het class attribuut met de waarde red hebben
	//$("p[class!=red]").css("border", "4px solid orange");
	$("[class$=T][id=2]").css("border", "3px solid grey");
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