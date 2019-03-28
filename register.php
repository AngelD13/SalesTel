<?php
	// Тут выполняется подключение к базе данных
	$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//	генерация соли для пароля
	/** function generateSalt()
	{
		$salt = '';
		$saltLength = 8; //длина соли
		for($i=0; $i<$saltLength; $i++) {
			$salt .= chr(mt_rand(33,126)); //символ из ASCII-table
		}
		return $salt;
	} **/

	// Если форма регистрации отправлена
	if (!empty($_POST['login']) and !empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['pass'])) {
	
		// Пишем логин и пароль из формы в переменные для удобства работы:
		$login = $_POST['login'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
		// Отсылаем SQL запрос на вставку:
		$pdo->query("INSERT INTO users SET login='$login', pass='$pass', name='$name', email='$email'");
	}
?>

<!-- Форма регистрации-->
<form action="" method="POST">
	Введите логин: <input name="login">
	Введите имя: <input name="name">
	Введите почту: <input name="email">
	Пароль: <input name="pass" type="password">
	<input type="submit" value="Отправить">
</form>