<?php
	// Тут выполняется подключение к базе данных
	$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Если форма авторизации отправлена...
	if (!empty($_POST['pass']) and !empty($_POST['login'])) {
		
		// Пишем логин и пароль из формы в переменные для удобства работы:
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		
		// Формируем и отсылаем SQL запрос:
		$query = "";
		$stmt = $pdo->query("SELECT * FROM users WHERE login='".$login."' AND pass='".$pass."'");
		
		// Преобразуем ответ из БД в нормальный массив PHP:
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (!empty($user)) {
			// Пользователь прошел авторизацию
			header("Location: index.php?nameses=$login");
  			exit;
		} else {
			// Пользователь неверно ввел логыин или пароль
			echo "Вы не правильно ввели данные, или являетесь незарегистрированным пользователем";
			header('refresh:1; Location: login.php');
  			exit;
		}
	}
?>
<form action="" method="POST">
	Введите имя: <input name="login">
	Введите пароль: <input name="pass" type="password">
	<input type="submit" value="Отправить">
</form>