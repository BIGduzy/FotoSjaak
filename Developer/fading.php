<style>
#blauwdivje
{
	width:250px;
	height:150px;
	background-color:RGBA(0,0,255,0.3);
}
</style>

<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		$('form').wrapAll('<div id="blauwdivje" />');
		$("#fadeout").click(function()
		{
			//$("#blauwdivje").fadeOut('slow');
			$("#blauwdivje").fadeOut('normal');
			//$("#blauwdivje").fadeOut('fast');
			//$("#blauwdivje").fadeOut(5000);
		});

		$("#fadein").click(function()
		{
			//$("#blauwdivje").fadeIn('slow');
			$("#blauwdivje").fadeIn('normal');
			//$("#blauwdivje").fadeIn('fast');
			//$("#blauwdivje").fadeIn(5000);
		});

		$("#fadeto").click(function()
		{
			//$("#blauwdivje").fadeTo('slow');
			$("#blauwdivje").fadeTo('normal', 0.2);
			//$("#blauwdivje").fadeTo('fast');
			//$("#blauwdivje").fadeTo(5000);
		});
	});
</script>


<form>
	username: <input type='text'/>
	password: <input type='text'/>
	<input type='submit'/>
</form>

<button id='fadein'>fadein</button>
<button id='fadeout'>fadeout</button>
<button id='fadeto'>fadeto</button>