<?
echo "
<div class='block-add'>
<div class='add__title'> Добавить музыку </div>
<div id='form_login'>
<form method = 'POST'enctype='multipart/form-data'>

<div> Наименование музыки </div>
<input type='text' name = 'name_music' class = 'phone_worker' required>

<div> Файл музыки </div>
<input type='file' name = 'music_artist'>

<br><br><input type='submit' id = 'auth_user' class='button' value='Добавить'>
</form>
</div>
</div>";
if(isset($_POST['name_music']))
{
	$music_artist = "/media/image/music/".$_FILES['music_artist']['name'];
	$db_connect -> add_music($name_music, $music_artist);
	move_uploaded_file($_FILES['music_artist']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/media/image/music/'.$_FILES['music_artist']['name']);
}


?>