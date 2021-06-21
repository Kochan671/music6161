<?
echo "
<div class='block-add'>
<div class='add__title'> Добавить жанр </div>
<div id='form_login'>
<form method = 'POST' enctype='multipart/form-data'>

<div> Наименование жанра </div>
<input type='text' name = 'name_ganre' class = 'phone_worker' required>

<div> Фотография </div>
<input type='file' name = 'photo_genre'>

<br><br><input type='submit' id = 'auth_user' class='button' value='Добавить'>
</form>
</div>
</div>";
if(isset($_POST['name_ganre']))
{
	
	
	$photo_genre = "/media/image/ganre/".$_FILES['photo_genre']['name'];
	$db_connect->add_genre($name_ganre, $photo_genre);
	move_uploaded_file($_FILES['photo_genre']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/media/image/ganre/'.$_FILES['photo_genre']['name']);
}


?>