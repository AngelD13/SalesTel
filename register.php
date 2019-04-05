<?php
	require_once 'form/form.header.php';
	session_start();
	
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
	if (!empty($_POST['login']) and !empty($_POST['name']) and !empty($_POST['email']))
	{
		if ($_POST['password'] == $_POST['confirm'])
		{
			// Пароль и подтверждение совпадают - регистрируем
			// Пишем логин и пароль из формы в переменные для удобства работы:
			$login = $_POST['login'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			
			// Отсылаем SQL запрос на вставку:
			$pdo->query("INSERT INTO users SET login='$login', pass='$pass', name='$name', email='$email'");

			// Пишем в сессию пометку об авторизации:
			$_SESSION['auth'] = true;
			
			// Получаем id вставленной записи и пишем его в сессию:
			$id = mysqli_insert_id($link);
			$_SESSION['id'] = $id;
		} else {
			// Пароль и подтверждение НЕ совпадают - выведем сообщение
			echo "Пароли не совпадают, попробуйте еще раз.";
		}

	
		
	}
?>

<!-- Форма регистрации-->
<div class="container">
	<section id="content">

		<form action="" method="POST">
			<h1>Форма регистрации</h1>
			Введите логин: <div>
					<input type="text" placeholder="Username" required="" id="login" name="login" />
			</div>
			Введите имя: <div>
					<input type="text" placeholder="Name" required="" id="name" name="name" />
			</div>
			E-mail: <div>
					<input type="text" placeholder="Email" required="" id="email" name="email" />
			</div>
			Пароль: <div>
					<input type="text" placeholder="Password" required="" id="pass" name="pass" />
			</div>
			Повторите пароль: <div>
					<input type="text" placeholder="Confirm" required="" id="confirm" name="confirm" />
			</div>
			<div>
				<input type="submit" value="Отправить">
			</div>
		</form>

</section>
</div>

<?php
	require_once 'form/form.footer.php';
?>