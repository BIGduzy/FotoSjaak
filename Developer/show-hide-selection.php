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
		$('#hide').click(function(){
			//$("#blauwdivje").hide();
			$("#blauwdivje").hide("normal");
			//$("#blauwdivje").hide("slow");
			//$("#blauwdivje").hide('fast');
			//$("#blauwdivje").hide(5000)
		});

		$('#show').click(function(){
			//$("#blauwdivje").show();
			//$("#blauwdivje").show("normal");
			//$("#blauwdivje").show("slow");
			//$("#blauwdivje").show('fast');
			$("#blauwdivje").show(10000)
		});

		$('#toggle').click(function(){
			//$("#blauwdivje").toggle();
			//$("#blauwdivje").toggle("normal");
			//$("#blauwdivje").toggle("slow");
			//$("#blauwdivje").toggle('fast');
			$("#blauwdivje").toggle(10000)
		});
	});
</script>


<form>
	username: <input type='text'/>
	password: <input type='text'/>
	<input type='submit'/>
</form>

<button id='show'>show</button>
<button id='hide'>hide</button>
<button id='toggle'>toggle</button>