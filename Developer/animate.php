<!--<style>
	#rooddiv
	{
		background-color:red;
		width:500px;
		height:300px;
	}
</style>-->

<script type='text/javascript'>
	$("document").ready(function(){
		$("button").click(function(){
			var cssOpjectBefore = {"width":"300px","height":"500px","top":"50px","left":"100px"}
			$("#rooddiv img").animate(cssOpjectBefore,4000,doeNogIets);
		});
	
	});
	
	function doeNogIets()
	{
		var cssOpjectAfter = {"width":"500px","height":"300px","top":"0px","left":"100px"}
			$("#rooddiv img").animate(cssOpjectAfter,100,doeNogIets2);
	}
	
	function doeNogIets2()
	{
			var cssOpjectBefore = {"width":"300px","height":"500px","top":"50px","left":"100px"}
			$("#rooddiv img").animate(cssOpjectBefore,100,doeNogIets);
	}
</script>

<div id='rooddiv' > <img src='./developer/img/ninjahamster.jpg' alt='ninja hamster 2'/> </div>
<button>animeeeeeeer mij </button>