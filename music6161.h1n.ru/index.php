<?
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
session_start();
echo "<html>
<head>
<meta charset='utf8mb4_general_ci'>
<title>Музыканты.РФ</title>
<link href='css/mar.css' rel='stylesheet' type='text/css'>
<link href='css/burger.css' rel='stylesheet' type='text/css'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<div  class='cookie_notice'>
  Этот сайт использует файлы cookies и сервисы сбора технических данных посетителей (данные об IP-адресе, местоположении и др.) для обеспечения работоспособности и улучшения качества обслуживания. Продолжая использовать наш сайт, вы автоматически соглашаетесь с использованием данных технологий.
  <div>
      <a class='cookie_btn' id='cookie_close' href='#close'>Согласиться</a>
      <a class='cookie_btn politica' for='modal-1' id='win1' href='./html/politica.php'>Политика конфиденциальности</a>
  </div>
  </div>
<body id = 'body'>
";
	include('config/connect.php');
	include('config/class_query.php');
	include('config/var.php');
	include('config/class_js.php');

	$query_db = new query_db();
	$db_connect = new db_connect(); // Подключение к классу connect
	
	
?>


<div id = 'top_window'>

	<?
		if ($_SESSION['auth'] == 'true') // Если пользователь авторизирован
		{
			echo "
			<div class='nav_menu'>
			<a href='index.php'><button class='div_menu btn btn3'>Главная</button></a>
			<a href='index.php?page=contact'><button class='div_menu btn btn3'>Контакты</button></a>
			<a href='index.php?page=add_artist'><button class='div_menu btn btn3'>Добавить артиста</button></a>
			<a href='index.php?page=add_music'><button class='div_menu btn btn3'>Добавить музыку</button></a>
			<a href='index.php?page=add_genre'><button class='div_menu btn btn3'>Добавить жанр</button></a>
			<a href='index.php?page=raise_album'><button class='div_menu btn btn3'>Собрать альбом</button></a>
			<a href='?exit'><button class='div_menu btn btn3'>Выйти</button></a>
			</div>
			<div class='hamburger-menu'>
                <input id='menu__toggle' type='checkbox'/>
                <label class='menu__btn' for='menu__toggle'>
                  <span></span>
                </label>
                <ul class='menu__box'>
                <li><a class='menu__item' href='index.php'>Главная</a></li>
                <li><a class='menu__item' href='index.php?page=contact'>Контакты</a></li>
                <li><a class='menu__item' href='index.php?page=add_artist'>Добавить артиста</a></li>
                <li><a class='menu__item' href='index.php?page=add_music'>Добавить музыку</a></li>
                <li><a class='menu__item' href='index.php?page=add_genre'>Добавить жанр</a></li>
                <li><a class='menu__item' href='index.php?page=raise_album'>Собрать альбом</a></li>
                <li><a class='menu__item' href='?exit'>Выйти</a></li>
                </ul>
              </div>
			";
		}
		else
		{
			echo "
			<div class='nav_menu'>
			<a href='index.php'><button class='div_menu btn btn3'>Главная</button></a>
			<a href='index.php?page=regist_user'><button class='div_menu btn btn3'>Зарегистрироваться</button></a>
			<a href='index.php?page=contact'><button class='div_menu btn btn3'>Контакты</button></a>
			<a href='index.php?page=login'><button class='div_menu btn btn3'>Войти</button></a>
			</div>
			<div class='hamburger-menu'>
                <input id='menu__toggle' type='checkbox'/>
                <label class='menu__btn' for='menu__toggle'>
                  <span></span>
                </label>
                <ul class='menu__box'>
                <li><a class='menu__item' href='index.php'>Главная</a></li>
                <li><a class='menu__item' href='index.php?page=regist_user'>Зарегистрироваться</a></li>
                <li><a class='menu__item' href='index.php?page=contact'>Контакты</a></li>
                <li><a class='menu__item' href='index.php?page=login'>Войти</a></li>
                </ul>
              </div>
			";
		}
	?>
</div>

<div id="worker_window">
    <div class="block">
<?
	if (isset( $_GET[ 'page' ]))
		{
			if ( $_GET[ 'page' ] == 'login') {
				include( 'html/login.php'); // Страница авторизации
			}
			if ( $_GET[ 'page' ] == 'regist_user') {
				include( 'html/regist_user.php' ); //Страница регистрации клиента
			}
			if ( $_GET[ 'page' ] == 'contact') {
				include( 'html/contact.php' );//Страница контактной информации
			}
			if ( $_GET[ 'page' ] == 'add_artist') {
				include( 'html/add_artist.php' ); //Страница добавления артиста
			}
			if ( $_GET[ 'page' ] == 'add_music') {
				include( 'html/add_music.php' ); //Страница добавления музыки
			}
			if ( $_GET[ 'page' ] == 'add_genre') {
				include( 'html/add_genre.php' ); //Страница добавления жанра
			}
			if ( $_GET[ 'page' ] == 'raise_album') {
				include( 'html/raise_album.php'); //Страница сборки альбома
			}
			if (preg_match('/^\d+$/i', $_GET[ 'page' ])) {
				$_SESSION['id_range'] = $_GET[ 'page' ];
				include( 'html/genre.php'); //Перейти на страницу жанра
			}
			if (preg_match('/artist[0-9]+/', $_GET[ 'page' ])) {
				$_SESSION['id_artiste'] = $_GET[ 'page' ];
				include( 'html/music.php'); //Перейти на страницу Артиста
			}
			/*if (preg_match('/music[0-9]+/', $_GET[ 'page' ])) {
				
				
				$_SESSION['id_music'] = $_GET[ 'page' ];
				$id_music = preg_replace('/music/', '', $_SESSION['id_music']);
				$result_song_user = $query_db->select_music_number($id_music);
				
				foreach($result_song_user as $value){
							
							$result_id_song = $value['id_song'];
							$result_end_song = $value['name'];
							$result_url_song = $value['song_url'];
							
						}
				
				
				//header('Content-Type: application/octet-stream');
				header('Content-Type: audio/mpeg');
				header('Content-Disposition: attachment; filename="'.basename($_SERVER['DOCUMENT_ROOT'].$result_url_song).'"');
				readfile($result_url_song);
			}*/
		
		
		}
	else
	{
	    
		if ($_SESSION['auth'] == 'true') // Если пользователь авторизирован
		{
			$query_db -> index_select_genre();
			
		}
		else {
		    	$query_db -> index_select_genre();
		}

	}
	
	
?>	
	<?
	if (isset($_GET['exit']))
				{
					session_destroy();
				//$_SESSION['auth'] = 'false';
				/**/
?>
<script>
location.replace("http://music6161.h1n.ru/");
</script>

<?
					exit;
				}
		
?>
	
</div>
</div>
<div id='footer_window'> 
	
	
<div class="block-contact">
                    <a href="#"><img src="media/icon/VK.png"> Вконтакте</a>
                    <a href="#"><img src="media/icon/Telegram.png">Телеграмм</a>
                    <a href="#"><img src="media/icon/Facebook.png">Фейсбук</a>
	</div>
	
	
</div>
<script src='./cooki.js'></script>
</body>
</html>