<script type='text/javascript'>
$(function() {
        $( ".datepicker" ).datepicker();
		$( ".datepicker" ).datepicker("option", "dateFormat","DD, d MM, yy");
		$("#eventForm").validate({
			messages :{
				Kort:'<p>Dit veld is niet ingevult.</p>'
				Lang:'<p>Dit veld is niet ingevult.</p>'
				opleveringsdatum:'<p>Dit veld is niet ingevult.</p>'
				evenementsdatum:'<p>Dit veld is niet ingevult.</p>'
			}
		});
    });
	
		
</script>
<?php
	$option="<option value=''>--aantal foto's--</option>";
	for ($i =50; $i <= 1000; $i+=50)
	{
		$option .="<option value='".$i."'>".$i."</option>";
	}
	
?>
<form action='index.php?content=opdracht' method='post' id='eventForm'>
	<textarea cols='80' rows='5' name='Kort' placeholder='Plaats hier een korte omschrijving van uw opdracht.'
	class='required'></textarea><br>
	
	<textarea cols='80' rows='10' name='Lang' placeholder='Plaats hier een uigebrijde omschrijving van uw opdracht.'
	class='required'></textarea><br>
	
	geef hier de opleveringsdatum.<br>
	<input type='text' name='opleveringsdatum' class='datepicker' placeholder='(yyyy-mm-dd)'
	class='required'/><br>
	
	geef hier de evenementsdatum.<br>
	<input type='text' name='evenementsdatum' class='datepicker'placeholder='(yyyy-mm-dd)'
	class='required'/><br>
	
	<input type='radio' name='color' value='color' checked='checked'>Kleur
	<input type='radio' name='color' value='blackAndWhite'>zwart-wit<br>
	
	<select name='number'><?php echo $option; ?>	</select>
	
	<input type='submit' name='submit'/>
</form>