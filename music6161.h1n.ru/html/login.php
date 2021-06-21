<?
echo "
<div class='block_login'>
<div class='title__login'> Войти </div>
<div id='form_login'>
<div id='img_logotip'></div>
<form method = 'POST'>
<div class='title'> Логин </div>
<input type='text' name = 'login' class = 'phone_worker'  class = 'input_style' required>
<br>
<br>
<div class='title'> Пароль </div>
<input type='password' name = 'password' class = 'input_style' required>
<br><br><button type='submit' id = 'auth_user' class='button btn btn1' name='submit_auth'>Войти</button
</form>
</div>
</div>";
if(isset($_POST['login']) && isset($_POST['password']))
{
		$db_connect->login_auth($login, $password);
}


?>