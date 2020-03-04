<?php
include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/add.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
$row=cust_conclusion($_GET["user_id"]);

?>
<!DOCTYPE html>
<body>
<div class="container">
  Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="new_add_transfor_cur.php" method="POST">
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
        <input type="radio" id="one" name="Type_fase" value="1" checked /> Однофазный <br>
        <input type="radio" id="three" name="Type_fase" value="2" /> Трехфазный <br>
        <script>
          window.onload = function()
          {
            document.getElementById('type2').style.display = 'none';
          }
        </script>
        <div id="type1">
          <div class="form-group">
            <label for="name">№ Трансформатора тока фА:</label>
            <input name="Num_tr_cur_fa" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L1:</label>
            <input name="L1_a" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L2:</label>
            <input name="L2_a" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I1:</label>
            <input name="I1_a" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I2:</label>
            <input name="I2_a" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">Другие места:</label>
            <input name="Other_places_plomb_a" class="form-control">
          </div>
        </div>

        <div id="type2">
          <div class="form-group">
            <label for="name">№ Трансформатора тока фБ:</label>
            <input name="Num_tr_cur_fb" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L1:</label>
            <input name="L1_b" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L2:</label>
            <input name="L2_b" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I1:</label>
            <input name="I1_b" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I2:</label>
            <input name="I2_b" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">Другие места:</label>
            <input name="Other_places_plomb_b" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">№ Трансформатора тока фС:</label>
            <input name="Num_tr_cur_fc" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L1:</label>
            <input name="L1_c" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">L2:</label>
            <input name="L2_c" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I1:</label>
            <input name="I1_c" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">I2:</label>
            <input name="I2_c" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">Другие места:</label>
            <input name="Other_places_plomb_c" class="form-control">
          </div>
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
</body>

 <script>
        document.getElementById('one').onclick = function() {
        document.getElementById('type2').style.display = 'none';
        }
        document.getElementById('three').onclick = function() {
        document.getElementById('type2').style.display = '';
        }
  </script>

<?php
//echo var_dump($_POST['Type_fase']);
if ($_POST['Type_fase']=="1")
{
  
  if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']) AND !empty($_POST['L1_a']) AND  !empty($_POST['L2_a']) AND !empty($_POST['I1_a']) AND !empty($_POST['I2_a']) AND !empty($_POST['Other_places_plomb_a']))
  {
     $result2 =  add_transfor_cur2(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Num_tr_cur_fa']),"-","-",($_POST['id_obj']),($_POST['user_id']),($_POST['Type_fase']));

    switch ($result2[0])
         {
            case "Add_tr_cur":

            $id_tr_cur=$result2[1];
            $user_id = $result2[2];
          
            if (!empty($_POST['L1_a']) AND !empty($_POST['L2_a']) AND !empty($_POST['I1_a']) AND !empty($_POST['I2_a']) AND !empty($_POST['Other_places_plomb_a']) AND !empty($id_tr_cur))
            {

              $result_plombs=add_plombs2("1",($_POST['L1_a']),($_POST['L2_a']),($_POST['I1_a']),($_POST['I2_a']),($_POST['Other_places_plomb_a']),$id_tr_cur);
          
             
              switch ($result_plombs)
              {
                case "Add":
                  ?>
                    <script>
                      var a = "<?php echo $user_id ?>";
                      alert ('Пломбы успешно добавлены');
                      window.location="customer.php?user_id="+a;
                    </script>
                  <?php  
                break;
                case "Err":
                  echo "Пломбы не добавлены";
                break;
              }
            }
            else {echo "Данных недостаточно";};
            break;
            
            case "Err-tr_cur":
              echo "Трансформатор тока не добавлен";
              break;

         }
  }

}
if ($_POST['Type_fase']=="2")
{
  if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['Num_tr_cur_fb']) AND !empty($_POST['Num_tr_cur_fc']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']) AND !empty($_POST['L1_a']) AND  !empty($_POST['L2_a']) AND !empty($_POST['I1_a']) AND !empty($_POST['I2_a']) AND !empty($_POST['Other_places_plomb_a']) AND !empty($_POST['L1_b']) AND  !empty($_POST['L2_b']) AND !empty($_POST['I1_b']) AND !empty($_POST['I2_b']) AND !empty($_POST['Other_places_plomb_b']) AND !empty($_POST['L1_c']) AND  !empty($_POST['L2_c']) AND !empty($_POST['I1_c']) AND !empty($_POST['I2_c']) AND !empty($_POST['Other_places_plomb_c']) AND !empty($_POST['Type_fase']));
  {
     $result = add_transfor_cur2(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Num_tr_cur_fa']),($_POST['Num_tr_cur_fb']),($_POST['Num_tr_cur_fc']),($_POST['id_obj']),($_POST['user_id']), ($_POST['Type_fase']));

     $user_id = ($_POST['user_id']);
     
     switch ($result[0])
         {
            case "Add_tr_cur":

            $id_tr_cur=$result[1];
             $user_id = $result[2];
          
            if (!empty($_POST['L1_a']) AND !empty($_POST['L2_a']) AND !empty($_POST['I1_a']) AND !empty($_POST['I2_a']) AND !empty($_POST['Other_places_plomb_a']) AND !empty($id_tr_cur))
            {

              $result_plombs1=add_plombs2("1",($_POST['L1_a']),($_POST['L2_a']),($_POST['I1_a']),($_POST['I2_a']),($_POST['Other_places_plomb_a']),$id_tr_cur);

              switch ($result_plombs1)
              {
                case "Add":
                  ?>
                    <script>
                      alert ('Пломбы фазы А успешно добавлены');
                    </script>
                  <?php  
                break;
                case "Err":
                ?>
                <script>
                      alert ('Пломбы Пломбы фазы А не добавлены');
                    </script>
                <?php
                break;
              }
            }
              else 
              {
               ?>
                  <script>
                    alert ('Данных для сохранения пломб фазы А недостаточно');
                  </script>
              <?php
              }

           if (!empty($_POST['L1_b']) AND !empty($_POST['L2_b']) AND !empty($_POST['I1_b']) AND !empty($_POST['I2_b']) AND !empty($_POST['Other_places_plomb_b']) AND !empty($id_tr_cur))
            {

              $result_plombs2=add_plombs2("2",($_POST['L1_b']),($_POST['L2_b']),($_POST['I1_b']),($_POST['I2_b']),($_POST['Other_places_plomb_b']),$id_tr_cur);

              switch ($result_plombs2)
              {
                case "Add":
                  ?>
                    <script>
                      alert ('Пломбы фазы Б успешно добавлены');
                    </script>
                  <?php  
                break;
                case "Err":
                ?>
                    <script>
                      alert ('Пломбы фазы Б не добавлены');
                    </script>
                  <?php 
                break;
              }
            }
              else 
              {
                ?>
                  <script>
                    alert ('Данных для сохранения пломб фазы Б недостаточно');
                  </script>
              <?php
              }
              
            if (!empty($_POST['L1_c']) AND !empty($_POST['L2_c']) AND !empty($_POST['I1_c']) AND !empty($_POST['I2_c']) AND !empty($_POST['Other_places_plomb_c']) AND !empty($id_tr_cur))
            {
              
              $result_plombs3=add_plombs2("3",($_POST['L1_c']),($_POST['L2_c']),($_POST['I1_c']),($_POST['I2_c']),($_POST['Other_places_plomb_c']),$id_tr_cur);

              switch ($result_plombs3)
              {
                case "Add":
                  ?>
                    <script>
                      alert ('Пломбы фазы С успешно добавлены');
                    </script>
                  <?php  
                break;

                case "Err":
                  ?>
                  <script>
                      alert ('Пломбы фазы С не добавлены');
                  </script>
                  <?php  
                break;
              }
                
            }

            else 
            {
              ?>
              <script>
                alert ('Данных для сохранения пломб фазы С недостаточно');
              </script>
              <?php
            }
            
            if ($result_plombs1==$result_plombs2 && $result_plombs2==$result_plombs3 && $result_plombs1==$result_plombs3)
            {
              ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Все пломбы успешно добавлены');
                window.location="customer.php?user_id="+a;
              </script>
              <?php
            }
             else
             {
              ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Не все пломбы были введены корректно');
                window.location="customer.php?user_id="+a;
              </script>
              <?php
             }
             
          break;
            
            case "Err-tr_cur":
            ?>
              <script>
                alert ('Данные о трансформаторе тока и пломб не добавлены');
              </script>
              <?php
            break;

          }
  }  
}

?>
