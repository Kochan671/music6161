<?
echo "
<div class='block-add'>
<div class='add__title'> Добавить артиста </div>
<div id='form_login'>

<form method = 'POST' enctype='multipart/form-data'>

<div> Имя(псевданим) </div>
<input type='text' name = 'name_artist' required>

<div> Описание </div>
<input type='text' name = 'desc_artist' required>


<div> Фотография </div>
<input type='file' name = 'photo_artist'>

<br><br><input type='submit' value='Добавить'>
</form>
</div>
</div>";
if(isset($_POST['name_artist']) && isset($_POST['desc_artist']))
{
	
	$photo_artist = "/media/image/artist/".$_FILES['photo_artist']['name'];
	$db_connect -> add_artist($name_artist, $desc_artist, $photo_artist);
	
	move_uploaded_file($_FILES['photo_artist']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/media/image/artist/'.$_FILES['photo_artist']['name']);
	
	
}


?>