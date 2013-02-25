<style>
#blauwdivje
{
 width:250px;
 height:150px;
 background-color:RGBA(0,0,255,0.3);
}
</style>

<script type = 'text/javascript'>
  $("document").ready(function(){
 // alert("het werkt");
  $('form').wrapAll('<div id = "blauwdivje" />');
  $("#slideup").click(function(){
   //$("#blauwdivje").slideUp('normal');
   //$("#blauwdivje").slideUp('slow');
   //$("#blauwdivje").slideUp('fast');
   $("#blauwdivje").slideUp('4000');
  });
  
  $("#slidedown").click(function(){
   //$("#blauwdivje").slideDown('normal');
   //$("#blauwdivje").slideDown('slow');
   //$("#blauwdivje").slideDown('fast');
   $("#blauwdivje").slideDown('6000');
   
  });
  
  $("#slidetoggle").click(function(){
   //$("#blauwdivje").slideToggle('normal');
   //$("#blauwdivje").slideToggle('slow');
   //$("#blauwdivje").slideToggle('fast');
   $("#blauwdivje").fadeToggle('6000');

   });
 });
</script>

<form>
 Username: <input type = 'text' />
 Password: <input type = 'text' />
  <input type = 'submit' />
</form>

<button id='slideup'>slideup</button>
<button id='slidedown'>slidedown</button>
<button id='slidetoggle'>slidetoggle</button>
 