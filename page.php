<?php
require_once 'form/form.header.php';
session_start();
@$id = $_GET['doNe'];
if (isset($_SESSION['auth']))
{
	echo "<div>";

	require_once 'form/form.quest.php';
	require_once 'form/form.answer.php';

	if (isset($_GET['doNe']));
	if (isset($_GET['doEnd']))
		{
			header('Location: index.php');
	  		exit;
		}


echo "</div>";
} else {
	echo "<div>";
	echo "У вас нет прав на просмотр даннойстраницы. ";
	echo "</div>";

}


require_once 'form/form.footer.php';

?>
