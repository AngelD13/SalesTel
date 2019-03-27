<?php

require_once 'form/form.header.php';
$id = $_GET['doNe'];

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

require_once 'form/form.footer.php';

?>
