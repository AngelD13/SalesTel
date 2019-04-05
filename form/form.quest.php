<?php
require_once 'src/function.bd.php';
?>

<div class="divQ">
    <p>
      <?php
      	if (!@$_GET['doNe']) $id = 1;
        $quest = get_quest($id);

        echo sprintf($quest['question'], $user_name);
      ?>
    </p>
</div>
