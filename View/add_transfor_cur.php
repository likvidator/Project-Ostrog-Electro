<?php
include '.\biblioticdib.php';
include '..\Model\add.php';


$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];

?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_transfor_cur.php" method="POST">
		<div class="form-group">
     	 	<label for="name">Тип:</label>
      		<input name="Type_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Марка:</label>
      		<input name="Mark_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Номинал:</label>
      		<input name="Denomin_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Год выпуска:</label>
      		<input type="date" name="Year_release_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фА:</label>
      		<input name="Num_tr_cur_fa" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фБ:</label>
      		<input name="Num_tr_cur_fb" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фС:</label>
      		<input name="Num_tr_cur_fc" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
      <div>
    	<div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
    	</div>
    	<div>
          <input type="hidden" name="id_obj" value = <?php echo (int) $id_obj;?> >
    	</div>
	 </form>
</div>

<?php
	if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['Num_tr_cur_fb']) AND !empty($_POST['Num_tr_cur_fc']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']))
	{
    echo "работает";

		 $result =  add_transfor_cur(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Num_tr_cur_fa']),($_POST['Num_tr_cur_fb']),($_POST['Num_tr_cur_fc']),($_POST['id_obj']),($_POST['user_id']));

		 switch ($result)
         {
            case "Add_tr_cur":
            ?>
             <script>
              alert ('Трансформатор тока успешно добавлен');
              window.location="consumer.php";
             </script>
            <?php  

              break;
            case "Err-tr_cur":
              echo "Трансформатор тока не добавлен";
              break;

         }
	}

?>