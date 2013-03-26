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
		$("#fadeOut").click(function()
		{
			$("#blauwdivje").fadeOut('slow');
			//$("#blauwdivje").fadeOut('normal');
			//$("#blauwdivje").fadeOut('fast');
			//$("#blauwdivje").fadeOut(5000);
		});

		$("#fadeIn").click(function()
		{
			$("#blauwdivje").fadeIn('slow');
			//$("#blauwdivje").fadeIn('normal');
			//$("#blauwdivje").fadeIn('fast');
			//$("#blauwdivje").fadeIn(5000);
		});

		$("#fadeToggle").click(function()
		{
			$("#blauwdivje").fadeToggle('slow');
			//$("#blauwdivje").fadeTo('normal', 0.9);
			//$("#blauwdivje").fadeTo('fast');
			//$("#blauwdivje").fadeTo(5000);
		});

		$("#blauwdivje").mouseover(function(){
			$(this).fadeTo('fast', 0.3);
		});

		$("#blauwdivje").mouseleave(function(){
			$(this).fadeTo('fast', 1.0);
		});
	});
</script>


<form>
	username: <input type='text'/>
	password: <input type='text'/>
	<input type='submit'/>
</form>

<button id='fadeIn'>fadeIn</button>
<button id='fadeOut'>fadeOut</button>
<button id='fadeToggle'>fadeToggle</button>