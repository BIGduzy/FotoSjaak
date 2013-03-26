<h3>Dit is een button</h3>
<style>

</style>
<script type='text/javascript'>
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#1').button({ icons: { primary:'ui-icon-gear',
								  secondary: 'ui-icon-triangle-1-s'},
								  label: 'Dit is wat tekst',
								  text: false
					   });
		$('#1').click(function(){
			var text = $( this ).button( "option", "text" );
			//alert(text);
			if ( text == false )
			{
				$(this).button('option', 'text', true);
			}
			else
			{
				$(this).button('option', 'text', false);
			}
		});

	});	
</script>

<button id='1'></button>