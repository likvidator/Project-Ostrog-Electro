<?php
include './biblioticdib.php';
include '../Model/add.php';

$user_id = $_GET["user_id"];
$id_tr_cur = $_GET["id_tr_cur"];
?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_plombs.php" method="POST">
    <select name="Phase">
      <option value="1">Фаза А</option>
      <option value="2">Фаза Б</option>
      <option value="3">Фаза С</option>
    </select>
		<div class="form-group">
     	 	<label for="name">L1:</label>
      		<input name="L1" class="form-control">
    </div>
    <div class="form-group">
     	 	<label for="name">L2:</label>
      		<input name="L2" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I1:</label>
      		<input name="I1" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I2:</label>
      		<input name="I2" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Другие места:</label>
      		<input name="Other_places_plomb" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
    	<div>
          <input type="hidden" name="id_tr_cur" value = <?php echo (int) $id_tr_cur;?> >
    	</div>
      <div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
      </div>
    </form>
</div>

<?php
	if (!empty($_POST["Phase"]) AND !empty($_POST['L1']) AND !empty($_POST['L2']) AND !empty($_POST['I1']) AND !empty($_POST['I2']) AND !empty($_POST['Other_places_plomb']) AND !empty($_POST['id_tr_cur']) AND !empty($_POST['user_id']))
	{
		$result=add_plombs(($_POST["Phase"]),($_POST['L1']),($_POST['L2']),($_POST['I1']),($_POST['I2']),($_POST['Other_places_plomb']),($_POST['id_tr_cur']));
    $user_id = $_POST['user_id'];
		switch ($result)
         {
            case "Add":
            ?>
               <script>
             //  var a = "<?php echo $user_id ?>";
             // alert ('Пломбы успешно добавлены');
             // window.location="customer.php?user_id="+a;
            </script>
            <?php  
            echo "работает";
              break;
            case "Err":
              echo "Пломбы не добавлены";
              break;

         }
	}
?>
