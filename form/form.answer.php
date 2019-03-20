<?php
require_once 'src/function.bd.php';
?>

<div class="divA">
  <p>
    <?php
      if (!$_GET['doNe']) {
        $id = 1;
      } else {
        $id = $_GET['doNe'];
      }

      $answerA = get_answer($id);
      foreach ($answerA as $answer) {
    ?>
    <form class="form-buttom" method="GET">
      <input type="hidden" name="doNe" value="<?php echo $answer['id_next_question']; ?>">
      <input type="submit" value="<?php echo $answer['answer']; ?>">
    </form>
    <?php } ?>
    <form class="form-buttom" method="GET">
      <input type="submit" name="doEnd" value="Завершить">
    </form>

  </p>

</div>
