<?php
	function add_cons($cons_name,$phone_cons,$Personal_account,$Face)
	{
	  include_once "../Controller/connection.php";
	  $connect = get_connect();
	  global $user_id;
	  if (!empty($cons_name) AND !empty($phone_cons) AND !empty($Personal_account) AND !empty($Face))
	  	{
	  		
	  		mysqli_query($connect,"INSERT INTO consumer (Name_consumer, Phone_consumer,Personal_account,Face)
  			VALUES ('$cons_name','$phone_cons','$Personal_account','$Face');");
 	

			$id_cons=mysqli_fetch_array(mysqli_query($connect,"select id_consumer from consumer where Name_consumer='".$cons_name."' AND Phone_consumer='".$phone_cons."' AND Personal_account='".$Personal_account."' AND Face='".$Face."'; "));

			$user_id=$id_cons["id_consumer"];
			$array = array(
    			0 =>"Add_cons",
   				1  => $user_id,
    			);
			return($array);
			exit();
		}

		else 
			{
				$array = array(
    			0 => "Err-cons",
    			);
				return($array);
				exit();
			}
	  
	}

	function add_object($owner_fio,$renter_fio,$name_object,$mail_address,$phone_object,$sourse_of_power,$vol_class,$user_id,$Balanse_state,$Number_TU,$Date_TU,$Description)
		{
			include_once "../Controller/connection.php";
			$connect = get_connect();
			if (!empty($owner_fio) AND !empty($renter_fio) AND !empty($name_object) AND !empty($mail_address) AND !empty($phone_object)  AND !empty($sourse_of_power) AND !empty($vol_class) AND !empty($user_id) AND !empty($Balanse_state)  AND !empty($Number_TU)  AND !empty($Date_TU) AND !empty($Description))
			{
					mysqli_query($connect,"INSERT INTO object (Owner_FIO, Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Obj_Cons_id, Balanse_state, Number_TU, Date_TU,Description)
  				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$user_id', '$Balanse_state', '$Number_TU', '$Date_TU', '$Description');");

				//echo "INSERT INTO Object (Owner_FIO, Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Obj_Cons_id)
  				//VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$user_id');";

				return 'Add_object';
	
				exit();
			}

				else 
			{
				return 'Err-object';
				exit();
			}  
		}

		function add_tr_vol ($Type_tr_vol,$Mark_tr_vol,$Denomin_tr_vol,$Plomb_tr_vol,$id_obj,$user_id)
		{

			include_once "../Controller/connection.php";
			$connect = get_connect();
			if (!empty($Type_tr_vol) AND !empty($Mark_tr_vol) AND !empty($Denomin_tr_vol) AND !empty($Plomb_tr_vol) AND !empty($user_id))
			{
					mysqli_query($connect,"INSERT INTO transfor_vol(Type_tr_vol,Mark_tr_vol,Denomin_tr_vol,Plomb_tr_vol,Object_id_tr_vol,Cons_id_obj_tr_vol)
  				VALUES ('$Type_tr_vol','$Mark_tr_vol','$Denomin_tr_vol','$Plomb_tr_vol','$id_obj','$user_id');");

					// echo "INSERT INTO Transfor_vol(Type_tr_vol,Mark_tr_vol,Denomin_tr_vol,Plomb_tr_vol,Object_id_tr_vol,Cons_id_obj_tr_vol)
  			// 	VALUES ('$Type_tr_vol','$Mark_tr_vol','$Denomin_tr_vol','$Plomb_tr_vol','$id_obj','$user_id');";
				

				return 'Add';
	
				exit();
			}

				else 
			{
				return 'Err';
				exit();
			}  
		}

		function add_counter($Type_count,$Mark_count,$Number_count,$Year_release_count,$Class_accur_count,$Kol_plomb_gospr,$Kol_holog_stick,$Plomb_netw_org,$Antimag_plomb,$Plomb_shu,$Other_places_count,$id_obj,$user_id, $Place,$Base_of_verifications,$Discharge,$Values_counter)
		{
			include_once "../Controller/connection.php";
			$connect = get_connect();
			
			if (!empty($Type_count) AND !empty($Mark_count)  AND !empty($Number_count)AND !empty($Year_release_count) AND !empty($Class_accur_count) AND !empty($Kol_plomb_gospr)  AND !empty($Kol_holog_stick)  AND !empty($Plomb_netw_org)  AND !empty($Antimag_plomb)  AND !empty($Plomb_shu)  AND !empty($Other_places_count)  AND !empty($id_obj) AND !empty($user_id) AND !empty($Place) AND !empty($Base_of_verifications)  AND !empty($Discharge) AND !empty($Values_counter))
			{
					mysqli_query($connect,"INSERT INTO counter (Type_count, Mark_count,Number_count,Year_release_count,Class_accur_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count,Obj_id_count,Obj_Cons_id_count, Place, Base_of_verifications,  Discharge,Values_counter )
  				VALUES ('$Type_count','$Mark_count','$Number_count','$Year_release_count','$Class_accur_count','$Kol_plomb_gospr','$Kol_holog_stick','$Plomb_netw_org','$Antimag_plomb','$Plomb_shu','$Other_places_count','$id_obj','$user_id' , '$Place','$Base_of_verifications','$Discharge','$Values_counter');");

					  echo "INSERT INTO counter (Type_count, Mark_count,Number_count,Year_release_count,Class_accur_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count,Obj_id_count,Obj_Cons_id_count, Place, Base_of_verifications,  Discharge,Values_counter )
  				// VALUES ('$Type_count','$Mark_count','$Number_count','$Year_release_count','$Class_accur_count','$Kol_plomb_gospr','$Kol_holog_stick','$Plomb_netw_org','$Antimag_plomb','$Plomb_shu','$Other_places_count','$id_obj','$user_id' , $Place,$Base_of_verifications,$Discharge,$Values_counter);";

					return 'Add_counter';
	
				exit();
			}

				else 
			{
				return 'Err-counter';
				exit();
			}  
		}
        
		function add_change_count($Date_change,$Cause_change,$FIO_change,$Nomber_old,$Nomber_new,$id_count)
		{
			include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($_POST['Date_change']) AND !empty($_POST['Cause_change']) AND !empty($_POST['FIO_change']) AND !empty($_POST['Nomber_old']) AND !empty($_POST['Nomber_new']) AND !empty($_POST['id_count']))
			{
				mysqli_query($connect,"INSERT INTO change_count (Date_change,Cause_change,FIO_change,Nomber_old,Nomber_new,Counter_id_count) VALUES ('$Date_change','$Cause_change','$FIO_change','$Nomber_old','$Nomber_new','$id_count');");
				 // echo "INSERT INTO Change_count (Date_change,Cause_change,FIO_change,Nomber_old,Nomber_new,Counter_id_count) VALUES ('$Date_change','$Cause_change','$FIO_change','$Nomber_old','$Nomber_new','$id_count');";

				return 'Add';
	
				exit();
			}

				else 
			{
				return 'Err';
				exit();
			} 
			

		}

        function add_dimension ($Date_dimen,$Alter_phase,$Load_fa,$Load_fb,$Load_fc,$Cos_fi,$Kol_turn_disk,$Power_consum,$id_obj,$user_id)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($Date_dimen) AND !empty($Alter_phase) AND !empty($Load_fa) AND !empty($Load_fb) AND !empty($Load_fc)  AND !empty($Cos_fi) AND !empty($Kol_turn_disk)  AND !empty($Power_consum)  AND !empty($id_obj)  AND !empty($user_id))
			{

			mysqli_query($connect,"INSERT INTO dimension (Date_dimen,Alter_phase,Load_fa,Load_fb,Load_fc,Cos_fi,Kol_turn_disk,Power_consum,Obj_id_dimen,Obj_Cons_id_dimen) VALUES ('$Date_dimen','$Alter_phase','$Load_fa','$Load_fb','$Load_fc','$Cos_fi','$Kol_turn_disk','$Power_consum','$id_obj','$user_id');");

					return 'Add_dim';
	
				exit();
			}

				else 
			{
				return 'Err-dim';
				exit();
			} 
        }

        function add_transfor_cur($Type_tr_cur,$Mark_tr_cur,$Denomin_tr_cur,$Year_release_tr_cur,$Num_tr_cur_fa,$Num_tr_cur_fb,$Num_tr_cur_fc,$id_obj,$user_id)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($Type_tr_cur) AND !empty($Mark_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Year_release_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Num_tr_cur_fa) AND !empty($Num_tr_cur_fb)  AND !empty($Num_tr_cur_fc) AND !empty($id_obj)  AND !empty($user_id))
			{
				mysqli_query($connect,"INSERT INTO transfor_cur (Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Obj_id_tr_cur,Obj_Cons_id_tr_cur) VALUES ('$Type_tr_cur','$Mark_tr_cur','$Denomin_tr_cur','$Year_release_tr_cur','$Num_tr_cur_fa','$Num_tr_cur_fb','$Num_tr_cur_fc','$id_obj','$user_id');");

				// echo "INSERT INTO Transfor_cur (Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Obj_id_tr_cur,Obj_Cons_id_tr_cur) VALUES ('$Type_tr_cur','$Mark_tr_cur','$Denomin_tr_cur','$Year_release_tr_cur','$Num_tr_cur_fa','$Num_tr_cur_fb','$Num_tr_cur_fc','$id_obj','$user_id')";

					return 'Add_tr_cur';
	
				exit();
			}

				else 
			{
				return 'Err-tr_cur';
				exit();
			} 
        }


	function add_transfor_cur2($Type_tr_cur,$Mark_tr_cur,$Denomin_tr_cur,$Year_release_tr_cur,$Num_tr_cur_fa,$Num_tr_cur_fb,$Num_tr_cur_fc,$id_obj,$user_id,$Type_fase)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($Type_tr_cur) AND !empty($Mark_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Year_release_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Num_tr_cur_fa) AND !empty($id_obj)  AND !empty($user_id))
			{
				if ($Type_fase=='1')
				{
					mysqli_query($connect,"INSERT INTO transfor_cur (Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Obj_id_tr_cur,Obj_Cons_id_tr_cur) VALUES ('$Type_tr_cur','$Mark_tr_cur','$Denomin_tr_cur','$Year_release_tr_cur','$Num_tr_cur_fa','-','-','$id_obj','$user_id');");
				}
				if ($Type_fase=='2')
				{
					mysqli_query($connect,"INSERT INTO transfor_cur (Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Obj_id_tr_cur,Obj_Cons_id_tr_cur) VALUES ('$Type_tr_cur','$Mark_tr_cur','$Denomin_tr_cur','$Year_release_tr_cur','$Num_tr_cur_fa','$Num_tr_cur_fb','$Num_tr_cur_fc','$id_obj','$user_id');");
				}
				$id_tr_cur = mysqli_fetch_array(mysqli_query($connect,"select id_tr_cur from transfor_cur WHERE Type_tr_cur='".$Type_tr_cur."'AND Mark_tr_cur='".$Mark_tr_cur."' AND Denomin_tr_cur='".$Denomin_tr_cur."' AND Year_release_tr_cur='".$Year_release_tr_cur."' AND Num_tr_cur_fa='".$Num_tr_cur_fa."' AND Num_tr_cur_fb='".$Num_tr_cur_fb."' AND Num_tr_cur_fc='".$Num_tr_cur_fc."' AND Obj_id_tr_cur='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."'; "));

				//echo var_dump($id_tr_cur);
				// echo "select id_tr_cur from transfor_cur WHERE Type_tr_cur='".$Type_tr_cur."'AND Mark_tr_cur='".$Mark_tr_cur."' AND Denomin_tr_cur='".$Denomin_tr_cur."' AND Year_release_tr_cur='".$Year_release_tr_cur."' AND Num_tr_cur_fa='".$Num_tr_cur_fa."' AND Num_tr_cur_fb='".$Num_tr_cur_fb."' AND Num_tr_cur_fc='".$Num_tr_cur_fc."' AND Obj_id_tr_cur='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';";

				$id_tr_cur2=$id_tr_cur["id_tr_cur"];

				//echo "id_tr_cur=====";
				 //echo $id_tr_cur2;

				$cur = array(
    			0 =>"Add_tr_cur",
   				1 => $id_tr_cur2,
   				2 => $user_id,
    			);

					
				return ($cur);
	
				exit();
			}

				else 
			{
				$cur = array(
    			0 =>"Err-tr_cur",
    			);
				return ($cur);
				exit();
			} 
        }

        

        function add_plombs($Phase,$L1,$L2,$I1,$I2,$Other_places_plomb,$id_tr_cur)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($Phase) AND !empty($L1) AND !empty($L2) AND !empty($I1) AND !empty($I2) AND !empty($Other_places_plomb) AND !empty($id_tr_cur))
			{
				
				mysqli_query($connect,"INSERT INTO plombs (L1,L2,I1,I2,Other_places_plomb) VALUES ('$L1','$L2','$I1','$I2','$Other_places_plomb');");
				$id_p=mysqli_fetch_array(mysqli_query($connect,"select id_plomb from plombs WHERE L1 ='".$L1."' AND L2 ='".$L2."' AND I1 ='".$I1."'  AND I2 ='".$I2."' AND Other_places_plomb='".$Other_places_plomb."';"));
				
				$id_plomb=$id_p['id_plomb'];
				
				mysqli_query($connect,"INSERT INTO phase_tr_cur (Phase,Transfor_cur_id_phase,Phase_id_plomb) VALUES ('$Phase','$id_tr_cur','$id_plomb');");
				

				return 'Add';
	
				exit();
			}
				else 
			{
				return 'Err';
				exit();
			} 

        }


          function add_plombs2($Phase,$L1,$L2,$I1,$I2,$Other_places_plomb,$id_tr_cur)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if (!empty($Phase) AND !empty($L1) AND !empty($L2) AND !empty($I1) AND !empty($I2) AND !empty($Other_places_plomb) AND !empty($id_tr_cur))
			{
				mysqli_query($connect,"INSERT INTO plombs (L1,L2,I1,I2,Other_places_plomb) VALUES ('$L1','$L2','$I1','$I2','$Other_places_plomb');");
				// echo "INSERT INTO Plombs (L1,L2,I1,I2,Other_places_plomb) VALUES ('$L1','$L2','$I1','$I2','$Other_places_plomb');";
				$id_p=mysqli_fetch_array(mysqli_query($connect,"select id_plomb from plombs WHERE L1 ='".$L1."' AND L2 ='".$L2."' AND I1 ='".$I1."'  AND I2 ='".$I2."' AND Other_places_plomb='".$Other_places_plomb."';"));
				
				// echo "select id_plomb from Plombs WHERE L1 ='".$L1."' AND L2 ='".$L2."' AND I1 ='".$I1."'  AND I2 ='".$I2."' AND Other_places_plomb='".$Other_places_plomb."';";
				$id_plomb=$id_p['id_plomb'];
				
				mysqli_query($connect,"INSERT INTO phase_tr_cur (Phase,Transfor_cur_id_phase,Phase_id_plomb) VALUES ('$Phase','$id_tr_cur','$id_plomb');");
				 // echo "INSERT INTO Phase_tr_cur (Phase,Transfor_cur_id_phase,Phase_id_plomb) VALUES ('$Phase','$id_tr_cur','$id_plomb');";
	
				return 'Add';
	
				exit();
			}
				else 
			{
				return 'Err';
				exit();
			} 

        }

        function add_all_dates($Type,$Date,$Conclusio,$Notes,$id_all,$type_pr)
        {
        	include_once "../Controller/connection.php";
			$connect = get_connect();

			if(!empty($Type) AND !empty($Date) AND !empty($Conclusio) AND !empty($Notes) AND !empty($id_all) AND !empty($type_pr))
			{

				mysqli_query($connect,"INSERT INTO date_list (Date_l,Type_date_id) VALUES ('$Date','$Type');");

				// echo "INSERT INTO Date_list (Date_l,Type_date_id) VALUES ('$Date','$Type');";

				$id=mysqli_fetch_array(mysqli_query($connect,"select MAX(id_Date) as id from date_list  WHERE Date_l ='".$Date."' AND Type_date_id ='".$Type."';"));

					// echo "select id_Date from Date_list  WHERE Date_l ='".$Date."' AND Type_date_id ='".$Type."';";

				$id_D= $id['id'];
				
				// echo "";
				 // echo $id_D;
				// echo "";
				// echo $type_pr;
				if ($type_pr==1)
				{
					mysqli_query($connect,"INSERT INTO all_dates (Date_list_id,Counter_id_count,Conclusio,Notes) VALUES ('$id_D','$id_all','$Conclusio','$Notes');");

					// echo "INSERT INTO All_dates (Date_list_id,Counter_id_count,Conclusio,Notes) VALUES ('$id_D','$id_all','$Conclusio','$Notes');";

				}
				if ($type_pr==2)
				{
					mysqli_query($connect,"INSERT INTO all_dates (Date_list_id,Transfor_cur_id,Conclusio,Notes) VALUES ('$id_D','$id_all','$Conclusio','$Notes');");

				}
				if ($type_pr==3)
				{
					mysqli_query($connect,"INSERT INTO all_dates (Date_list_id,Transfor_vol_id,Conclusio,Notes) VALUES ('$id_D','$id_all','$Conclusio','$Notes');");

				}

				return 'Add';
	
				exit();
				}
				else 
				{
				return 'Err';
				exit();
				} 

			

        }
?>