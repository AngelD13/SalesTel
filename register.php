<?php
	require_once 'form/form.header.php';
	require_once 'src/function.ses.php';
	session_start();
	
	// Тут выполняется подключение к базе данных
	$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	

	// Если форма регистрации отправлена
	if (!empty($_POST['login']) and !empty($_POST['name']) and !empty($_POST['email']))
	{
		if ($_POST['pass'] == $_POST['confirm'])
		{
			// Пароль и подтверждение совпадают - регистрируем
			// Пишем логин и пароль из формы в переменные для удобства работы:
			$login = $_POST['login'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$date = date('Y-m-d');
			
			$loginQ = $pdo->query("SELECT login FROM users WHERE login='$login'");
			$emailQ = $pdo->query("SELECT login FROM users WHERE email='$email'");

			// Проверка на уникальность логина и почты
			if (empty($loginQ))
			{
				echo "Такой логин уже существует, побробуйте другой.";
			} elseif (empty($emailQ)) {
				echo "Такой адрес почты уже занят.";
			} else {
				//Генерируем соль с помощью функции generateSalt() и солим пароль...
				$salt = generateSalt(); //генерируем соль
				$saltedPass = md5($pass.$salt); //соленый пароль
				
				// Отсылаем SQL запрос на вставку:
				$pdo->query("INSERT INTO users SET login='$login', pass='$saltedPass', salt='$salt', name='$name', email='$email', reg_date ='$date', users_rights='0';");

				// Пишем в сессию пометку об авторизации:
				$_SESSION['auth'] = true;
				$_SESSION['login'] = $login;
				$_SESSION['id'] = $user['id']; 
				header('Location: index.php');
			}
		} else {
			// Пароль и подтверждение НЕ совпадают - выведем сообщение
			echo "Пароли не совпадают, попробуйте еще раз.";
		}

	
		
	}

	require_once 'form/form.register.php';
	require_once 'form/form.footer.php';
?>