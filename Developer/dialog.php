dialoog
<style>
#blok
{
	width:100px;
	height:100px;
	background-color:RGBA(6,6,6,1);
}
</style>
<script type='text/javascript'>
	$('document').ready(function(){
		//alert("test");
			$('#button').click(function(){
				$('#dialog').dialog({ buttons:{ "Maak blauw" : function(){
																$('#blok').css('background-color','RGBA(0,0,255,1)')
																$(this).dialog('close')
																},
												"Maak groen" : function(){
																$('#blok').css('background-color','RGBA(0,255,0,1)')
																$(this).dialog('close')																
																},
												"Maak rood" : function(){
																$('#blok').css('background-color','RGBA(255,0,0,1)')
																$(this).dialog('close')
																}
				
				
												},
											modal:true,
											width:450,
											height:100,
											show:'slow',
										close: function(event,ui){
										alert("gesloten");
										}
					});
		});
		
	});
</script>
<div id='blok'></div>
<div id='dialog' title='maak een keuze'></div>
<button id='button'>toon dialoog</div>