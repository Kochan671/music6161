<?
//------------------- Данные пользователя ----------------------------
$_SESSION['auth']; //Авторизован ли пользователь
$session_login = $_SESSION['session_login']; // Логин пользователя
$session_password = $_SESSION['session_password']; // Пароль пользователя


$login = $_POST['login']; //Переданный логин с формы
$password = $_POST['password']; //Переданный пароль с формы
//------------------------------------------


//------------------- Данные артиста ----------------------------

$name_artist = $_POST['name_artist']; //Имя или псевданим артиста
$desc_artist = $_POST['desc_artist']; //Описание артиста
//------------------------------------------

//------------------- Данные музыки ----------------------------

$name_music = $_POST['name_music']; //Наименование музыки

//------------------------------------------

//------------------- Данные жанра ----------------------------

$name_ganre = $_POST['name_ganre']; //Наименование жанра

//------------------------------------------


//------------------- Собрать альбом ----------------------------

$id_genre = $_POST['id_genre']; //Наименование жанра
$id_artist = $_POST['id_artist']; //Наименование артиста
$id_song = $_POST['id_song']; //Наименование музыки
//------------------------------------------




?>