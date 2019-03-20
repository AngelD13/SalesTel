<?php
ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', 'E_ALL');
ini_set('display_startup_errors', 'E_ALL');

require_once 'form/form.header.php';
$id = $_GET['id'];

echo "<div>";

require_once 'form/form.quest.php';
require_once 'form/form.answer.php';

echo "</div>";

require_once 'form/form.footer.php';
?>