<?php
require_once 'form/form.header.php';

echo "<p>";
  echo "<a href=\"page.php\">Начинаем продажи</a>";
echo "</p>";
$username = get_current_user();
echo $username;

require_once 'form/form.footer.php';
?>
