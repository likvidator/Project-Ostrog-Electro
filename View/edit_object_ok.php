<?php 
include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/edit.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}


global $o;

if(!empty($_POST['Owner_FIO']) AND !empty($_POST['Renter_FIO'])  AND !empty($_POST['Name_object'])  AND !empty($_POST['Mailing_address'])  AND !empty($_POST['Phone_object'])  AND !empty($_POST['Source_of_power'])  AND !empty($_POST['Voltage_class']) AND !empty($_GET["id_obj"]) AND !empty($_GET["user_id"]) AND !empty($_POST["Balanse_state"]) AND !empty($_POST["Number_TU"]) AND !empty($_POST["Date_TU"]))

    {
        $result =  edit_object_update($_POST['Owner_FIO'],$_POST['Renter_FIO'],$_POST['Name_object'],$_POST['Mailing_address'],$_POST['Phone_object'],$_POST['Source_of_power'],$_POST['Voltage_class'],$_GET["id_obj"],$_POST["Balanse_state"],$_POST["Number_TU"],$_POST["Date_TU"],$_POST["Description"]);

          $user_id = ($_GET['user_id']);

        switch ($result)
         {
            case "Edit_obj":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Объект успешно отредактирован');
                window.location="customer.php?user_id="+a;
              </script>
            <?php  
             // break;
              case "Err-edit-obj":
                echo "Объект не отредактирован";
              break;         
          }
    }
    else

      // echo var_dump($_POST);
   
    

?>