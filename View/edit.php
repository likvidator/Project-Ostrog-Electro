<?php

include '.\biblioticdib.php';
include '..\Model\edit.php';

echo $head;
edit_cons ($_GET["user_id"]);
$user_id = $_GET["user_id"];


?>
<!DOCTYPE html>
<div class="container">
  <form class="form-container" action="edit_ok.php?user_id=<?php echo (int)$user_id; ?>" method="POST">
    <div class="form-group">
      <label  for="name">ФИО</label>
      <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
    </div>

    <div class="form-group">
      <label  for="Phone_consumer">Телефон</label>
      <input type="text" name="Phone_consumer" class="form-control" value="<?php echo $phone; ?>">
    </div>

    <div class="button-container">
      <input autofocus class="btn btn-success" type="submit" value="Готово">
      </div>
  </form>
</div>
