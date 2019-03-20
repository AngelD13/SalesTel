<?php
$pdo = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // временные параметры
$user = get_current_user();

$results_user = $pdo->query("SELECT name FROM users WHERE login='".$user."'");
$user_sql = $results_user->fetch(PDO::FETCH_ASSOC);
if ($results_user) {
  $user_name = $user_sql['name'];
  echo "<br>";
} else {
  exit("У пользователя ($user) нет доступа");
}

function get_quest($id=1)
{
  $pdoQ = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
	$stmt = $pdoQ->query("SELECT id, question FROM la_question WHERE id='".$id."'");

  if($result = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    return $result;
  } else {
    die('Возникла ошибка: ');
  }
}

function get_answer($id=1)
{
  $pdoA = new PDO('mysql:host=localhost;dbname=salestel;charset=utf8', 'root', '');
  $stmt = $pdoA->query("SELECT id, id_question, id_next_question, answer FROM la_answer WHERE id_question='".$id."'");
  $result = array();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $result[$row['id']] = $row;
  }
  return $result;
}



?>
