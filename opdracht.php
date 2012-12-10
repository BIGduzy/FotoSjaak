<script type='text/javascript'>
$(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker("option", "dateFormat","DD, d MM, yy");
    });
</script>
<form action='' method=''>
	Plaats hier een korte omschrijving van uw opdracht.
	<textarea cols='80' rows='5' name='Kort'></textarea><br>
	Plaats hier een uigebrijde omschrijving van uw opdracht.
	<textarea cols='80' rows='10' name='Lang'></textarea><br>
	geef hier de opleveringsdatum.<br>
	<input type='text' name='datepicker' id='datepicker'/>
</form>