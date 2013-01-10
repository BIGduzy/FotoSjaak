<?php
	require_once("./Class/PhotoClass.php");
	
	if (isset($_POST['submit']))
	{		
			//var_dump($_FILES['foto']);
			
			//in dit erray staan alle bestandsypen(mine-types) die je accepteerd als uploadfile.
			$mime_type = array('image/png','image/jpeg','image/pjpeg','image/gif');
			
			if (in_array($_FILES['foto']['type'],$mime_type))
			{
				$dir = 'fotos/'.$_POST['user_id']."/".$_POST['order_id']."/";
				
				if (!file_exists($dir))
				{
						mkdir($dir,0777,true);
						mkdir($dir."thumbnail/",0777,true);
				}
				
				if (is_uploaded_file($_FILES['foto']['tmp_name']))
				{
					move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$_FILES['foto']['name']);
				}
				
				//Maken van thumbnail
				define('THUM_SIZE',80);
				$path_photo = $dir.$_FILES['foto']['name'];
				$path_thumnail = $dir."thumbnail/tn_".$_FILES['foto']['name'];
				$specs_image = getimagesize($path_photo);
				$ratio_image = $specs_image[0]/$specs_image[1];
				// als het groter dan 1 is: landscape. als kleiner dan 1: portrait foto. als 1: squere foto.
				if ($ratio_image >= 1)
				{
					//landscape
					$tn_width = THUM_SIZE;
					$tn_height = THUM_SIZE/$ratio_image;
				}
				else
				{
					//portrait
					$tn_width = THUM_SIZE*$ratio_image;
					$tn_height = THUM_SIZE;
				}
				
				$thumb = imagecreatetruecolor($tn_width,$tn_height);
				
				switch ($_FILES['foto']['type'])
				{
					/////////////////
					///////PNG///////
					/////////////////
					case 'image/png':
						$source = imagecreatefrompng($path_photo);
						imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]);
						imagepng($thumb,$path_thumnail,9);
					break;
					
					/////////////////
					///////JPEG//////
					/////////////////
					case 'image/jpeg':
						$source = imagecreatefromjpeg($path_photo);
						imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]);
						imagejpeg($thumb,$path_thumnail,100);
					break;
					
					/////////////////
					///////PJPEG/////
					/////////////////
					case 'image/pjpeg':
						$source = imagecreatefromjpeg($path_photo);
						imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]);
						imagejpeg($thumb,$path_thumnail,100);
					break;
					
					/////////////////
					///////GIF///////
					/////////////////
					case 'image/gif':
						$source = imagecreatefromgif($path_photo);
						imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]);
						imagegif($thumb,$path_thumnail);
					break;
				
				}
				//schrijf het record weg naar de foto tabel.
				PhotoClass::insert_into_photo($_POST['order_id'],$_FILES['foto']['name'],$_POST['Beschrijving']);
				
				echo"het uploaden is gelukt ";
				header("refresh:4;url=index.php?content=upload_form&customer=".$_POST['user_id']."&order_id=".$_POST['order_id']);
				
				
			}
			else
			{
				echo"het is niet gelukt om dit bestand te uploaden de extentie:
				".$_FILES['foto']['type']." is niet toegestaan. u wordt door gestuurd naar de uploadpagina.";
				header("refresh:4;url=index.php?content=upload_form&customer=".$_POST['user_id']."&order_id=".$_POST['order_id']);	
			}
	}
	else
	{
		
?>
<table>
	<?php PhotoClass::show_photos($_GET['customer'],$_GET['order_id']); ?>
</table>
<form action='index.php?content=upload_form' method='POST' enctype='multipart/form-data' >
	<table>
		<tr>
			<td>kies een foto</td>
			<td><input type='file' name='foto' /></td>
		</TR>
		<tr>
			<td>Beschrijving foto</td>
			<td><textarea cols='50' rows='5' name='Beschrijving'></textarea></td>
		</TR>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur'/></td>
		</TR>
	</table>
	<input type='hidden' name='user_id' value='<?php echo $_GET["customer"]; ?>'/>
	<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"]; ?>'/>
</form>
<?php
}
?>