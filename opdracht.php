<script type='text/javascript'>
	$( function() {
		$(".datepicker").datepicker({ dateFormat: "dd-mm-yyyy" });
		$('#eventForm').validate({
			rules: {
				order_short : 'required',
				order_long : 'required',
				deliveryDate : 'required',
				eventDate : 'required',
				numberOffPicktures : 'required'
			
			},
			messages : {
				order_short : '<p>U bent verplicht dit veld in te vullen</p>',
				order_long : '<p>U bent verplicht dit veld in te vullen</p>',
				deliveryDate : '<p>U bent verplicht dit veld in te vullen</p>',
				eventDate : '<p>U bent verplicht dit veld in te vullen</p>',
				numberOffPicktures : '<p>U bent verplicht dit veld in te vullen</p>'
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
	
	if (isset ($_POST['submit']))
	{
		require_once("./Class/OrderClass.php");
		
		
		OrderClass::insert_into_Order($_POST);
	}
	else
	{
?>


<form action='index.php?content=opdracht' method='post' id='eventForm'>
	<textarea cols='80' rows='5' name='order_short' placeholder='Plaats hier een korte omschrijving van uw opdracht.'
	></textarea><br>
	
	<textarea cols='80' rows='10' name='order_long' placeholder='Plaats hier een uigebrijde omschrijving van uw opdracht.'
	></textarea><br>
	
	geef hier de opleveringsdatum.<br>
	<input type='text' name='deliveryDate' class='datepicker' placeholder='(dd-mm-yyyy)'
	/><br>
	
	geef hier de evenementsdatum.<br>
	<input type='text' name='eventDate' class='datepicker'placeholder='(dd-mm-yyyy)'
	/><br>
	
	<input type='radio' name='color' value='color' checked='checked'>Kleur
	<input type='radio' name='color' value='blackAndWhite'>zwart-wit<br>
	
	<select name='numberOffPicktures'><?php echo $option; ?>	</select>
	
	<input type='submit' name='submit' value='verstuur'/>
</form>
<?php
}
?>