<?php
require_once 'form/form.header.php';
?>
<h1><a href="login.php">Вход</a></h1>
<br/>
<?php 
//isset($_GET['msg']) ? $_GET['msg'] : '';

echo "<p>";
  echo "<a href=\"page.php\">Начинаем продажи</a>";
echo "</p>";
//$username = get_current_user();
//echo $username;
echo "</br>";
echo "Рады вашему посещению ".$_GET['nameses'];


require_once 'form/form.footer.php';
?>
