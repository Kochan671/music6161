<?	// Параметры для подключения


	class db_connect //Подключение к базе данынх
{	
		
	/*public $host = "localhost";
	public $user = "mysql";
	public $password = "mysql";
	public $table = "site";
	public $mysqli_con = "";
	// Подключение к БД
*/	public $host = "localhost";
	public $user = "user_admin";
	public $password = "zxcasd911";
	public $table = "db_site";
	public $mysqli_con = "";
	//----------------------------------------------------------------------------
	
	//Прочие переменные
	public $result_user, $row, $query_rows, $static_table, $db_connect, $id_user_row, $update_ball, $new_ball_query, $ball_use_query, $sum_ball_calculation;  
	//----------------------------------------------------------------------------
	
	//Переменные sql запросов
	
	
	
	
	public function __construct() // Подключение к базе данных
		{	
			$this->host;
			$this->user;
			$this->password;
			$this->table;
			$this->mysqli_con = new mysqli($this->host, $this->user, $this->password, $this->table);
			$this->mysqli_con->query("SET NAMES 'UTF8'");
			
		}
		
		
		function login_auth($login, $password)// Модуль авторизации пользователя
		{
			
			$query_db = new query_db();
			$result_auth = $query_db->num_auth_user($login, $password);
			
		
		
		if($result_auth != 0 && $result_auth <2 )
		{
			$_SESSION['auth'] = 'true';
			?>
			<script> alert('Вход осуществлен'); </script>
			<script>
			location.replace("http://music6161.h1n.ru/");
			</script>
	
			<?	
		
		}
		else
		{
			
			
			echo "
			
			<script> alert('Логин или пароль не верен!. $result_auth'); </script>
			
			";
		}
		}
		
		function reg_user($login, $password)// Модуль регистрации пользователя
		{
			
			$query_db = new query_db();
			$result_reg = $query_db->num_auth_user_login($login); 
		
		 	if($result_reg <= 1)
			{
				$query_db->add_new_user($login, $password); //Регистрация нового пользователя
				
				
				echo "
			
				<script> alert('Пользователь зарегестрирован. Произведите вход на странице авторизации'); 
				
				
				location.replace('http://music6161.h1n.ru/?page=login');
				
				</script>
			
				";
				
				
				
			}
			else
			{
				echo "
			
				<script> alert('Такой логин уже существует'); </script>
			
				";
			}
		}
		
		
		
		function add_artist($name_artist, $desc_artist, $photo_artist)// Модуль добавления артиста
			{
				
				$query_db = new query_db();
				$query_db -> add_artist($name_artist, $desc_artist, $photo_artist);
				
			}
		
		function add_music($name_music, $music_artist) // Модуль добавления музыки
			{
			
				$query_db = new query_db();
				$query_db -> add_music($name_music, $music_artist);
			
			}
		
		function add_genre($name_ganre, $photo_genre) // Модуль добавления музыки
			{
			
				$query_db = new query_db();
				$query_db -> add_genre($name_ganre, $photo_genre);
			
			}
		
		function createGenreArtisanSong($id_genre,$id_artist,$id_song) // Модуль создания альбома
			{
			
				$query_db = new query_db();
				$query_db -> createGenreArtisanSong($id_genre,$id_artist,$id_song);
			
			}
		function artist_range($id_range) // Модуль вывода артистов соответствующего жанра
			{
			
				$query_db = new query_db();
				$query_db -> artist_range($id_range);
			
			}
		function artist_music($id_artist) // Модуль вывода артистов соответствующего жанра
			{
				
				$query_db = new query_db();
				$query_db -> artist_music($id_artist);
			
			}
		
		
		
		
		
		
		
}
?>