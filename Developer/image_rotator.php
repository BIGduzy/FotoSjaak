<script type='text/javascript' >
	$("document").ready(function(){
		//alert("test");
		setInterval("veranderFoto()",4000);
		
		$("div#imgagerotator img").attr( {"width":"250px","height":"200px"});
		
		$("div#imgagerotator img").css({"position":"absolute","z-index" : 0});
		
		$("#imgagerotator .huidigeFoto").css("z-index", 2);
		
	});
	
	function veranderFoto()
	{
		var huidigeFoto = $("#imgagerotator div.huidigeFoto");
		var volgendeFoto = huidigeFoto.next();
		
		if (volgendeFoto.length == 0)
		{
			volgendeFoto = $('#imagerotator div:first');
		}
		
		huidigeFoto.removeClass('huidigeFoto')
				   .addClass('volgendeFoto');
				   
		volgendeFoto.addClass('huidigeFoto');
		huidigeFoto.removeClass('volgendeFoto');
	}
</script>

<div id='imgagerotator'>
	<div class='huidigeFoto'>
		<img src='./developer/img/rdhamster.jpg' alt='rd hamster'/>
	</div>
	
	<div >
		<img src='./developer/img/ninja_hamster.png' alt='ninja hamster'/>
	</div>
	
	<div>
		<img src='./developer/img/ninjahamster.jpg' alt='ninja hamster 2'/>
	</div>
</div>