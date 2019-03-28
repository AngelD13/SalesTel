<?php
require_once 'form/form.header.php';
?>
<h1>
	<a href="login.php">Вход</a>
</h1>
</br>
<h1>
	<a href="register.php">Регистрация</a>
</h1>
</br>
<p>
	<a href="page.php">Начинаем продажи</a>
</p>

<br/>
<?php 
//isset($_GET['msg']) ? $_GET['msg'] : '';

//$username = get_current_user();
//echo $username;
if (isset($_POST['login'])) echo "Рады вашему посещению ".$_POST['login'];


require_once 'form/form.footer.php';
?>
