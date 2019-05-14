<?php
	require_once 'form/form.header.php';
	require_once 'src/function.ses.php';

	// Тут выполняется подключение к базе данных
	$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Если форма авторизации отправлена...
	if (!empty($_POST['pass']) and !empty($_POST['login'])) {
		
		// Пишем логин и пароль из формы в переменные для удобства работы:
		$login = $_REQUEST['login'];
		$pass = $_REQUEST['pass'];

		
		// Формируем и отсылаем SQL запрос:
		$stmt = $pdo->query("SELECT * FROM users WHERE login='".$login."'");
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (!empty($user)) {
			// Получаем соль
			$salt = $user['salt'];
			// Солим
			$saltedPass = md5($pass.$salt);
			
			if ($user['pass'] == $saltedPass)
			{
				session_start();
				// Пользователь прошел авторизацию
				echo "Вы успешно аторизированы ".$_POST['login'];
				$_SESSION['auth'] = true;
				$_SESSION['login'] = $login;
				$_SESSION['id'] = $user['id']; 
				header("refresh: 3; url=http://localhost/SalesTel/index.php");
	  			exit;
	  		} else {
	  			echo "Вы ввели не верный пароль";
	  			header("refresh: 3; url=http://localhost/SalesTel/login.php");
	  		}
		} else {
			// Пользователь неверно ввел логыин или пароль
			echo "Нет такого логина. Попробуйте еще раз.";
			header("refresh: 3; url=http://localhost/SalesTel/login.php");
  			exit;
		}
	}

	require_once 'form/form.login.php';
	require_once 'form/form.footer.php';
?>