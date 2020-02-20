<?php
function add_counter1($Type_count,$Mark_count,$Year_release_count,$Class_accur_count,$Date_gospr_count,$Date_next_pr_count,$Kol_plomb_gospr,$Kol_holog_stick,$Plomb_netw_org,$Antimag_plomb,$Plomb_shu,$Other_places_count,$id_obj,$user_id)
		{
			include_once "../Controller/connection.php";
			$connect = get_connect();
			


			if (!empty($Type_count) AND !empty($Mark_count) AND !empty($Year_release_count) AND !empty($Class_accur_count) AND !empty($Date_gospr_count)  AND !empty($Date_next_pr_count) AND !empty($Kol_plomb_gospr)  AND !empty($Kol_holog_stick)  AND !empty($Plomb_netw_org)  AND !empty($Antimag_plomb)  AND !empty($Plomb_shu)  AND !empty($Other_places_count)  AND !empty($id_obj) AND !empty($user_id))
			{
					mysqli_query($connect,"INSERT INTO counter (Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count,Obj_id_count,Obj_Cons_id_count)
  				VALUES ('$Type_count','$Mark_count','$Year_release_count','$Class_accur_count','$Date_gospr_count','$Date_next_pr_count','$Kol_plomb_gospr','$Kol_holog_stick','$Plomb_netw_org','$Antimag_plomb','$Plomb_shu','$Other_places_count','$id_obj','$user_id');");

					

					return 'Add_counter';
	
				exit();
			}

				else 
			{

				return 'Err-counter';
				exit();
			}  
		}
?>