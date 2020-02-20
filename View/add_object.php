<?php

include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/add.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}

$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);

?>
<!DOCTYPE html>
<div class="container">
 Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="add_object.php" method="POST">
 		<div class="form-group">
    		<label  for="name">Собственник</label>
    		<input type="text" name="Owner_FIO" class="form-control">
  		</div>

 		<div class="form-group">
    		<label  for="name">Арендатор</label>
   			<input type="text"  name="Renter_FIO" class="form-control">
  		</div>

  		<div class="form-group">
    		<label  for="name">Название объекта</label>
    		<input type="text" name="Name_object" class="form-control">
  		</div>

  		<div class="form-group">
    		<label  for="name">Почтовый адрес</label>
    		<input type="text" name="Mailing_address" class="form-control">
 		</div>

 		<div class="form-group">
    		<label  for="name">Номер телефона</label>
    		<input type="text" name="Phone_object" class="form-control">
 		</div>

  		<div class="form-group">
    		<label  for="name">Источник питания</label>
    		<input type="text" name="Source_of_power" class="form-control">
  		</div>

  		<div class="form-group">
    		<label for="name">Класс напряжения</label>
    		<input type="text" name="Voltage_class" class="form-control">
  		</div>
		<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
      	<input type="hidden" name="user_id" value = "<?php echo $user_id;?>">
	</form>
</div>

<?php
    if(!empty($_POST['Owner_FIO']) AND !empty($_POST['Renter_FIO']) AND !empty($_POST['Name_object']) AND !empty($_POST['Mailing_address'] ) AND !empty($_POST['Phone_object']) AND !empty($_POST['Source_of_power']) AND !empty($_POST['Voltage_class']) AND !empty($_POST["user_id"]))
    {
        $result =  add_object(($_POST['Owner_FIO']),($_POST['Renter_FIO']),($_POST['Name_object']),($_POST['Mailing_address']),($_POST['Phone_object']),($_POST['Source_of_power']),($_POST['Voltage_class']),($_POST['user_id']));
		// echo result;
		$user_id = ($_POST['user_id']);
        switch ($result)
         {
            case "Add_object":
            ?>
			<script>
			 var a = "<?php echo $user_id ?>";			 
             alert ('Объект успешно добавлен');
             window.location="customer.php?user_id="+a;
            </script>
            <?php 
             // echo "Объект успешно добавлен";
            break;
            case "Err-object":
              echo "Объект не добавлен";
              break;
            
         }     
    }
?>
