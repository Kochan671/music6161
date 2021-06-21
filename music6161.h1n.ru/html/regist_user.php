<?
echo "
<div class='block_login'>
<div class='title__login'> Регистрация </div>
<div id='form_login'>
<div id='img_logotip'></div>
<form method = 'POST'>
<div class='title'> Логин </div>
<input type='text' name = 'login' title='Вы забыли знак @' placeholder='example@mail.ru' class = 'login'  class = 'input_style' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required>
<br>
<br>
<div class='title'> Пароль </div>
<input type='password' name ='password' title='Пароль должен содержать 1 заглавную букву и 1 цифру' placeholder='от 6 до 16 символов' class = 'input_style' pattern='(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}' required>
<br><br><button type='submit' id ='reg_user' class='button btn btn1'>Зарегестрироваться</button>
</form>
</div>
</div>";


if(isset($_POST['login']) && isset($_POST['password']))
{
	$db_connect -> reg_user($login, $password);
}



?>