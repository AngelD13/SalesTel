<?php
	require_once 'form/form.header.php';
	session_start();
	// Тут выполняется подключение к базе данных
	$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Если форма авторизации отправлена...
	if (!empty($_POST['pass']) and !empty($_POST['login'])) {
		
		// Пишем логин и пароль из формы в переменные для удобства работы:
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		
		// Формируем и отсылаем SQL запрос:
		// $query = "";
		$stmt = $pdo->query("SELECT * FROM users WHERE login='".$login."' AND pass='".$pass."'");
		
		// Преобразуем ответ из БД в нормальный массив PHP:
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (!empty($user)) {
			// Пользователь прошел авторизацию
			echo "Вы успешно аторизированы ".$_POST['login'];
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $login;
			header("refresh: 3; url=http://localhost/SalesTel/index.php");
  			exit;
		} else {
			// Пользователь неверно ввел логыин или пароль
			echo "Вы не правильно ввели данные, или являетесь незарегистрированным пользователем. Попробуйте еще раз.";
			header("refresh: 3; url=http://localhost/SalesTel/login.php");
  			exit;
		}
	}
?>

<!-- Форма входа-->
<div class="container">
	<section>

		<form action="" method="POST">
			<h1>Форма входа</h1>
			<div>
					<input type="text" placeholder="Username" required="" id="username" name="login" />
			</div>
			<div>
					<input type="password" placeholder="Password" required="" id="password" name="pass" />
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