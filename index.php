<?php
	require_once 'form/form.header.php';
	session_start();
	//isset($_GET['msg']) ? $_GET['msg'] : '';

	//$username = get_current_user();
	//echo $username;
	if (isset($_SESSION['auth']))
	{
		echo "Рады вашему посещению ".$_SESSION['login'];
		echo "<div>";
		echo "<a href=\"page.php\">Начинаем продажи</a>";
		echo "</div>";
		echo "<div>";
		echo "<a href=\"logout.php\">Выход</a>";
		echo "</div>";




	} else {
		echo "<div>";
		echo "<a href=\"login.php\">Вход на сайт</a>";
		echo "</div>";
		echo "<div>";
		echo "<a href=\"register.php\">Регистрация</a>";
		echo "</div>";
	}

	require_once 'form/form.footer.php';
?>
