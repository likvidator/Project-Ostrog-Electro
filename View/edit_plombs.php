<?php
include './biblioticdib.php';
include '../Model/edit.php';
include '../Model/cons.php';

$id_tr_cur = $_GET["id_tr_cur"];
$id_plomb = $_GET["id_plomb"];
$Phase=$_GET["phase"];
$user_id = $_GET["user_id"];
edit_plombs($_GET["id_tr_cur"],$_GET["id_plomb"],$_GET["phase"]);
$row=cust_conclusion($_GET["user_id"]);
?>
<!DOCTYPE html>
<div class="container">
   Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="edit_plombs_ok.php?id_tr_cur=<?php echo (int)$id_tr_cur; ?>&id_plomb=<?php echo (int)$id_plomb; ?>&user_id=<?php echo (int)$user_id; ?>" method="POST">
        <?php
          if($Phase==1)
          {echo'
            <select name="Phase">
            <option selected value="1">Фаза А</option>
            <option value="2">Фаза Б</option>
            <option value="3">Фаза С</option>
            </select>';
          }
          if($Phase==2)
          {echo'
            <select name="Phase">
            <option value="1">Фаза А</option>
            <option selected value="2">Фаза Б</option>
            <option value="3">Фаза С</option>
            </select>';
          }
          if($Phase==3)
          {echo'
            <select name="Phase">
            <option value="1">Фаза А</option>
            <option value="2">Фаза Б</option>
            <option selected value="3">Фаза С</option>
            </select>';
           }
        ?>
		  <div class="form-group">
     	 	<label for="name">L1:</label>
      	<input name="L1" class="form-control"  value="<?php echo $L1_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">L2:</label>
      		<input name="L2" class="form-control"  value="<?php echo $L2_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I1:</label>
      		<input name="I1" class="form-control"  value="<?php echo $I1_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I2:</label>
      		<input name="I2" class="form-control"  value="<?php echo $I2_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Другие места:</label>
      		<input name="Other_places_plomb" class="form-control"  value="<?php echo $other_pl; ?>">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>