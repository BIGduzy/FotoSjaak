<?php
class DbFormat
{
	public static function translate_color($color)
	{
		return ($color == "color") ? "kleur" : "z/w";
	}
	
	public static function translate_paid($paid)
	{
		return ($paid == "yes") ? "ja" : "nee";
	}
	
	public static function translate_confirmed($confirmed)
	{
		return ($confirmed == "yes") ? "ja" : "nee";
	}
}
?>