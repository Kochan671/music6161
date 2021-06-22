<? // Тут находятся куски кода, которые повторяются на разных страницах
	class query_db
	{
		
		
		function num_auth_user($login, $password) // Проверка совпадения пары логин - пароль
		{
   			$db_connect = new db_connect();
			$num_auth = $db_connect->mysqli_con->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
			$result = $num_auth->num_rows;
			return $result;
		}
		
		
		function id_auth_user($login, $password) // Извлечь id пользователя из БД
		{
   			$db_connect = new db_connect();
			$result = $db_connect->mysqli_con->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
			while ($row = $result->fetch_array()) 
	        	{
					$result_array[] = $row['id_worker'];
				}
			return $result_array;
		}	
		
		function add_new_user($login, $password) // Добавление нового пользователя
		{
   			$db_connect = new db_connect();
			$result = $db_connect->mysqli_con->query("INSERT INTO users VALUES (NULL, '$login',  '$password')");
		}
		
		function num_auth_user_login($login)  // Проверка совпадения логина
		{
   			$db_connect = new db_connect();
			$num_auth = $db_connect->mysqli_con->query("SELECT * FROM users WHERE login = '$login'");
			$result = $num_auth->num_rows;
			return $result;
		}
		
		
		function select_artist() //Выбрать всех артистов
		{
			$db_connect = new db_connect();
		$result = $db_connect->mysqli_con->query('SELECT * FROM artist');
		while ($row = $result->fetch_assoc())
                {
					echo '<option value="'.$row['id_artist'].'">'.$row['artist_name'].'</option>';
					echo '<option value="'.$row['id_artist'].'">'.$row['artist_desc'].'</option>';
  				}	
		}
	
		function select_genre() //Выбрать всех жанры
			{
			$db_connect = new db_connect();
			$result = $db_connect->mysqli_con->query('SELECT * FROM genre');
			while ($row = $result->fetch_assoc())
                {
					echo '<option value="'.$row['id_genre'].'">'.$row['name'].'</option>';
  				}
			}
		
		function index_select_genre() //Выбрать всех жанры (метод для index.php)
			{
			$db_connect = new db_connect();
			$result = $db_connect->mysqli_con->query('SELECT * FROM genre');
			while ($row = $result->fetch_assoc())
                {   
                    echo '<div class="block__genre">';
					echo '<div class="genre_view" name='.$row["id_genre"].'><a href="index.php?page=' .$row["id_genre"]. '">' .$row["name"]. '</a></div>';
					echo '<div class="genre_view"><img src = '.$row["img"].'></div>';
  				    echo '</div>';
                    
                }
			}
		
		
		
			function select_music() //Выбрать все музыки
			{
				$db_connect = new db_connect();
				$result = $db_connect->mysqli_con->query('SELECT * FROM song');
				while ($row = $result->fetch_assoc())
                	{
					echo '<option value="'.$row['id_song'].'">'.$row['name'].'</option>';
  					}
			}
	
	
			function createGenreArtisanSong($id_genre,$id_artist,$id_song) //Создать альбом
				{
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("INSERT INTO album(artist_album,genre_album,song_album) values('$id_artist','$id_genre','$id_song')");
				}
				
			function add_artist($name_artist, $desc_artist, $photo_artist) //Добавить артиста
				{
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("INSERT INTO artist (artist_name, artist_img, artist_desc) values('$name_artist','$photo_artist','$desc_artist')");
				}
		
			function add_music($name_music, $music_artist) //Добавить музыку
				{
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("INSERT INTO song (name, song_url) values ('$name_music', '$music_artist')");
				}
		
			function add_genre($name_ganre, $photo_genre)//Добавить жанр
				{	
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("INSERT INTO genre (name, img) values ('$name_ganre', '$photo_genre')");
				}
		
		
			function artist_range($id_range) //Показать артистов по жанру
				{	
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("SELECT * FROM album,artist WHERE artist.id_artist=album.artist_album and genre_album = '$id_range' GROUP BY artist_album");
					while ($row = $result->fetch_assoc())
                	{
						
						$id_result_artist = $this->select_artist_number($row['artist_album']);
						
						
						foreach($id_result_artist as $value){
						
							$result_end = $value['artist_name'];
							$result_url = $value['artist_img'];
				            $result_desc=$value['artist_desc'];
							
						}
						echo '<div class="block__genre">';
						echo '<br><div><a href = "index.php?page=artist'.$row['artist_album'].'">'.$result_end.'</a></div>';
						echo '<div class="genre_view"><img src = '.$result_url.'></div>';
						echo '<br><div class="desc"><span>'.$row['artist_desc'].'</span></div>';
						echo '</div>';
  					}
					
				}
		
			function select_artist_number($id_range) //Выбрать определенного артиста
				{	
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("SELECT * FROM artist WHERE id_artist = '$id_range'");
					while ($row = $result->fetch_assoc())
                	{
						
						$row[] = [
							
							
							"artist_name" => $row['artist_name'],
							"artist_img" => $row['artist_img'],
						];
							
							
							
							
						
						return $row;
  					}
				}
		
		
		
		function artist_music($id_artist) //Показать музыку артиста
				{	
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("SELECT * FROM album WHERE artist_album = '$id_artist'");
					while ($row = $result->fetch_assoc())
                	{
						
						$id_result_artist = $this->select_music_number($row['song_album']);
						
						
						foreach($id_result_artist as $value){
							$result_id = $value['id_song'];
							$result_end = $value['name'];
							$result_url = $value['song_url'];
							
						}
						//echo '<div><a href = "index.php?page=music'.$result_id.'">'.$result_end.'</a></div>';
                        
						echo '<div class="block__genre">';
						echo "<p style='color:white; font-size:25px'>".$result_end."</p>"; // Выводим название файла
    					echo "<audio controls='controls'>"; // Выводим тег аудио с панелью управления
    					echo "<source type='audio/mpeg' src='".$result_url."' />"; // Подключаем путь к аудио-файлу
						echo "</audio>"; // Закрываем тег
    					echo "<br /><br />"; // Переходим на 2 перехода на новую строку
    					echo '</div>';
  					}
					
				}
		
		function select_music_number($id_song) //Выбрать определенного артиста
				{
					$db_connect = new db_connect();
					$result = $db_connect->mysqli_con->query("SELECT * FROM song WHERE id_song = '$id_song'");
					while ($row = $result->fetch_assoc())
                	{
						
						$row[] = [
							
							"id_song" => $row['id_song'],
							"name" => $row['name'],
							"song_url" => $row['song_url'],
							
							
						];
							
							
							
							
						
						return $row;
  					}
				}
		
		
		
		
		
	}




?>