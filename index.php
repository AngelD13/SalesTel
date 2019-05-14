<?php
	require_once 'form/form.header.php';
	session_start();
	//isset($_GET['msg']) ? $_GET['msg'] : '';

	//$username = get_current_user();
	//echo $username;
	if (isset($_SESSION['auth']))
	{
		echo "Рады вашему посещению ".$_SESSION['login'];
		require_once 'form/form.work.php';
	} else {
		require_once 'form/form.input.php';
	}

	require_once 'form/form.footer.php';
?>
