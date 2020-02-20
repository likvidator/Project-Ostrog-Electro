<?php
include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/delete.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}


if(!empty($_GET["id_obj"]) AND !empty($_GET["user_id"]))
  
	$result=del_object($_GET["id_obj"]);
  $user_id = ($_GET['user_id']);
	switch ($result)
         {
            case "Del_obj":
            // echo "Объект успешно удален";
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Объект успешно удален');
                window.location="customer.php?user_id="+a;
                </script>
            <?php  
              break;
            case "Err_del-obj":
              echo "Объект не удален";
              break;
          }

?>