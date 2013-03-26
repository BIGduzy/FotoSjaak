<style>
 #imagerotator div
 {
	position:absolute;
	z-index:0;
 }

 #imagerotator .huidigeFoto
 {
	z-index:2;
 }
 
 #imagerotator .vorigeFoto
 {
	z-index:1;
 }
 
 #imagerotator img
 {
	width:200px;
	height:180px;
 }
</style>

<p>De image rotator</p>
<script type='text/javascript' >
	$("document").ready(function(){
		//alert("Het werkt");
		setInterval("veranderFoto()", 200);					
	});

	function veranderFoto()
	{
		var huidigeFoto = $("#imagerotator div.huidigeFoto");
		var volgendeFoto = huidigeFoto.next();

		if ( volgendeFoto.length == 0 )
		{
			volgendeFoto = $('#imagerotator div:first');
		}

		huidigeFoto.removeClass('huidigeFoto')
				   .addClass('vorigeFoto');
		volgendeFoto.addClass('huidigeFoto');
		huidigeFoto.removeClass('vorigeFoto');
	}
</script>

<div id='imagerotator'>
	<div class='huidigeFoto'>
		<img src='./developer/img/ninja_hamster.png' alt='ninjaHamster' />
	</div>
	<div >
		<img src='./developer/img/ninjahamster.jpg' alt='ninjaHamstersbroertje' />
	</div>
	<div>
		<img src='./developer/img/rdhamster.jpg' alt='russische dwerghamster' />
	</div>
</div>