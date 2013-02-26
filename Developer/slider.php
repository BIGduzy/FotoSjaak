<h3>Dit is een slider</h3>
<style>
#Hslider
{
	width:100px;
	height:10px;
}
#Vslider
{
	width:10px;
	height:100px;
}
</style>
<script type='text/javascript'>
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#Hslider').slider({ max: 400,
							  min: 0,
							  orientation: "horizontal",
							  value: 100,
							  slide: function( event, ui ) {
								$('#hamster').css('width', ui.value);
							  }							
							});
		$('#Vslider').slider({ max: 400,
							  min: 0,
							  orientation: "vertical",
							  value: -100,
							  slide: function( event, ui ) {
								$('#hamster').css('height', ui.value);
							  }							
							});
	});
</script>

<div id='Hslider'></div>
<div id='Vslider'></div>
<img id='hamster' src='./developer/img/ninjahamster.jpg' />