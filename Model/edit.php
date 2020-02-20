<?php
function edit_cons($id_cons)
		{
			include_once "../Controller/connection.php";
			$connect = get_connect();
			if (!empty($id_cons))
			{
				global $name;
				global $phone;
				global $per_acc;
				global $face;
				
				$n=mysqli_fetch_array(mysqli_query($connect,"select Name_consumer from consumer  WHERE id_consumer ='".$id_cons."';"));
				echo "select Name_consumer from consumer  WHERE id_consumer ='".$id_cons."';";
				$ph=mysqli_fetch_array(mysqli_query($connect,"select Phone_consumer from consumer  WHERE id_consumer='".$id_cons."';"));
				$per=mysqli_fetch_array(mysqli_query($connect,"select Personal_account from consumer  WHERE id_consumer='".$id_cons."';"));
				$f=mysqli_fetch_array(mysqli_query($connect,"select Face from consumer  WHERE id_consumer='".$id_cons."';"));
				$name=$n["Name_consumer"];
				$phone=$ph["Phone_consumer"];
				$per_acc=$per["Personal_account"];
				$face=$f["Face"];
			}

		}
		function edit_cons2 ($cons_name,$phone_cons,$id_cons,$face,$per_ac)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  
	  		if (!empty($cons_name) AND !empty($phone_cons) AND !empty($id_cons) AND !empty($face) AND !empty($per_ac))
	  		{
	  			mysqli_query($connect,"UPDATE Consumer SET Name_consumer='".$cons_name."' WHERE id_consumer='".$id_cons."';");
	  			 // echo "UPDATE Consumer SET Name_consumer='".$cons_name."' WHERE id_consumer='".$id_cons."';";

	  			mysqli_query($connect,"UPDATE Consumer SET Phone_consumer='".$phone_cons."' WHERE id_consumer='".$id_cons."';");

	  			 // echo "UPDATE Consumer SET Phone_consumer='".$phone_cons."' WHERE id_consumer='".$id_cons."';";

	  			mysqli_query($connect,"UPDATE Consumer SET Face='".$face."' WHERE id_consumer='".$id_cons."';");

	  			 // echo "UPDATE Consumer SET Face='".$face."' WHERE id_consumer='".$id_cons."';";

				mysqli_query($connect,"UPDATE Consumer SET Personal_account='".$per_ac."' WHERE id_consumer='".$id_cons."';");
				// echo "UPDATE Consumer SET Personal_account='".$per_ac."' WHERE id_consumer='".$id_cons."';";

	  			return 'Edit_cons';
	
				exit();
			}

			else 
			{
				return 'Err-edit';
				exit();
			}
	  
		}

		function edit_object ($id_obj)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($id_obj))
			{
				global $ow_fio;
				global $ren_fio;
				global $nam_obj;
				global $mail_add;
				global $phon_obj;
				global $sour_of_pow;
				global $vol_cl;
				
				

				$Ow_FIO=mysqli_fetch_array(mysqli_query($connect,"select Owner_FIO from object  WHERE id_object ='".$id_obj."';"));
				$Ren_FIO=mysqli_fetch_array(mysqli_query($connect,"select Renter_FIO from object  WHERE id_object='".$id_obj."';"));
				$Nam_obj=mysqli_fetch_array(mysqli_query($connect,"select Name_object from object  WHERE id_object='".$id_obj."';"));
				$Mail_dd=mysqli_fetch_array(mysqli_query($connect,"select Mailing_address from object  WHERE id_object='".$id_obj."';"));
				$Ph_obj=mysqli_fetch_array(mysqli_query($connect,"select Phone_object from object  WHERE id_object='".$id_obj."';"));
				$Sour_of_pow=mysqli_fetch_array(mysqli_query($connect,"select Source_of_power from object  WHERE id_object='".$id_obj."';"));
				$Vol_class=mysqli_fetch_array(mysqli_query($connect,"select Voltage_class from object  WHERE id_object='".$id_obj."';"));
				

				$ow_fio=$Ow_FIO["Owner_FIO"];
				$ren_fio=$Ren_FIO["Renter_FIO"];
				$nam_obj=$Nam_obj["Name_object"];
				$mail_add=$Mail_dd["Mailing_address"];
				$phon_obj=$Ph_obj["Phone_object"];
				$sour_of_pow=$Sour_of_pow["Source_of_power"];
				$vol_cl=$Vol_class["Voltage_class"];
			
			}
	  		
		}

		function edit_object_update($owner_fio,$ren_fio,$name_object,$mail_addr,$phone_obj,$sour_of_pow,$vol_class,$id_obj)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  
	  		if (!empty($owner_fio) AND !empty($ren_fio) AND !empty($name_object) AND !empty($mail_addr) AND !empty($phone_obj) AND !empty($sour_of_pow) AND !empty($vol_class) AND !empty($id_obj)) 
	  		{
	  			mysqli_query($connect,"UPDATE Object SET Owner_FIO='".$owner_fio."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Renter_FIO='".$ren_fio."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Name_object='".$name_object."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Mailing_address='".$mail_addr."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Phone_object='".$phone_obj."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Source_of_power='".$sour_of_pow."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Voltage_class='".$vol_class."' WHERE id_object='".$id_obj."';");
	  			return 'Edit_obj';
	
				exit();
			}

			else 
			{
				return 'Err-edit-obj';
				exit();
			}
		}

		function edit_counter($user_id,$id_obj)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($user_id) AND !empty($id_obj))
	  		{
	  			global $type;
	  			global $mark;
	  			global $number;
	  			global $year;
	  			global $class_acc;
	  			global $date_gospr;
	  			global $date_next;
	  			global $kol_pl;
	  			global $kol_hol;
	  			global $pl_netw;
	  			global $anti_pl;
	  			global $pl_shu;
	  			global $other;

	  			$type_count=mysqli_fetch_array(mysqli_query($connect,"select Type_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$mark_count=mysqli_fetch_array(mysqli_query($connect,"select Mark_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));

	  			$number_count=mysqli_fetch_array(mysqli_query($connect,"select Number_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));

	  			$year_release_count=mysqli_fetch_array(mysqli_query($connect,"select Year_release_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$class_accur_count=mysqli_fetch_array(mysqli_query($connect,"select Class_accur_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$date_gospr_count=mysqli_fetch_array(mysqli_query($connect,"select Date_gospr_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$date_next_pr_count=mysqli_fetch_array(mysqli_query($connect,"select Date_next_pr_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$kol_plomb_gospr=mysqli_fetch_array(mysqli_query($connect,"select Kol_plomb_gospr from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$kol_holog_stick=mysqli_fetch_array(mysqli_query($connect,"select Kol_holog_stick from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$plomb_netw_org=mysqli_fetch_array(mysqli_query($connect,"select Plomb_netw_org from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$antimag_plomb=mysqli_fetch_array(mysqli_query($connect,"select Antimag_plomb from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$plomb_shu=mysqli_fetch_array(mysqli_query($connect,"select Plomb_shu from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$other_places_count=mysqli_fetch_array(mysqli_query($connect,"select Other_places_count from counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));

	  			$type=$type_count["Type_count"];
	  			$mark=$mark_count["Mark_count"];
	  			$number=$number_count["Number_count"];
	  			$year=$year_release_count["Year_release_count"];
	  			$class_acc=$class_accur_count["Class_accur_count"];
	  			$date_gospr=$date_gospr_count["Date_gospr_count"];
	  			$date_next=$date_next_pr_count["Date_next_pr_count"];
	  			$kol_pl=$kol_plomb_gospr["Kol_plomb_gospr"];
	  			$kol_hol=$kol_holog_stick["Kol_holog_stick"];
	  			$pl_netw=$plomb_netw_org["Plomb_netw_org"];
	  			$anti_pl=$antimag_plomb["Antimag_plomb"];
	  			$pl_shu=$plomb_shu["Plomb_shu"];
	  			$other=$other_places_count["Other_places_count"];


	  		}
		}

		function edit_counter_update($type_count,$mark_count,$number_count,$year_release_count,$class_accur_count,$kol_plomb_gospr,$kol_holog_stick,$plomb_netw_org,$antimag_plomb,$plomb_shu,$other_places_count,$id_obj,$user_id)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($type_count) AND !empty($mark_count) AND !empty($number_count) AND !empty($year_release_count) AND !empty($class_accur_count)AND !empty($kol_plomb_gospr) AND !empty($kol_holog_stick)  AND !empty($plomb_netw_org)  AND !empty($antimag_plomb)  AND !empty($plomb_shu)  AND !empty($other_places_count)  AND !empty($id_obj)AND !empty($user_id)) 
	  		{
	  			mysqli_query($connect,"UPDATE Counter SET Type_count='".$type_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Mark_count='".$mark_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");	  	
	  			mysqli_query($connect,"UPDATE Counter SET Number_count='".$number_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");			;
	  			mysqli_query($connect,"UPDATE Counter SET Year_release_count='".$year_release_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Class_accur_count='".$class_accur_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Kol_plomb_gospr='".$kol_plomb_gospr."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Kol_holog_stick='".$kol_holog_stick."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Plomb_netw_org='".$plomb_netw_org."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Antimag_plomb='".$antimag_plomb."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Plomb_shu='".$plomb_shu."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Other_places_count='".$other_places_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");

	  			return 'Edit_counter';
	
				exit();
	  		}
	  		
	  		else 
			{
				return 'Err-edit-count';
				exit();
			}
		}

		function edit_dimension($user_id,$id_obj)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($user_id) AND !empty($id_obj))
	  		{
	  			global $date;
	  			global $alter;
	  			global $fa;
	  			global $fb;
	  			global $fc;
	  			global $cos;
	  			global $kol_turn;
	  			global $power;
	  			
	  			$date_dim=mysqli_fetch_array(mysqli_query($connect,"select Date_dimen from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$alter_dim=mysqli_fetch_array(mysqli_query($connect,"select Alter_phase from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$fa_dim=mysqli_fetch_array(mysqli_query($connect,"select Load_fa from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$fb_dim=mysqli_fetch_array(mysqli_query($connect,"select Load_fb from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$fc_dim=mysqli_fetch_array(mysqli_query($connect,"select Load_fc from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$cos_dim=mysqli_fetch_array(mysqli_query($connect,"select Cos_fi from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$kol_turn_dim=mysqli_fetch_array(mysqli_query($connect,"select Kol_turn_disk from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));
	  			$power_dim=mysqli_fetch_array(mysqli_query($connect,"select Power_consum from dimension WHERE  Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';"));

	  			$date=$date_dim["Date_dimen"];
	  			$alter=$alter_dim["Alter_phase"];
	  			$fa=$fa_dim["Load_fa"];
	  			$fb=$fb_dim["Load_fb"];
	  			$fc=$fc_dim["Load_fc"];
	  			$cos=$cos_dim["Cos_fi"];
	  			$kol_turn=$kol_turn_dim["Kol_turn_disk"];
	  			$power=$power_dim["Power_consum"];

	  		}

		}

		function edit_dimension_update($date_dimen,$alter_phase,$load_fa,$load_fb,$load_fc,$cos_fi,$kol_turn_disk,$power_consum,$id_obj,$user_id)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($date_dimen) AND !empty($alter_phase) AND !empty($load_fa) AND !empty($load_fb) AND !empty($load_fc) AND !empty($cos_fi) AND !empty($kol_turn_disk) AND !empty($power_consum) AND !empty($id_obj) AND !empty($user_id))
	  		{
	  			mysqli_query($connect,"UPDATE Dimension SET Date_dimen='".$date_dimen."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Alter_phase='".$alter_phase."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Load_fa='".$load_fa."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Load_fb='".$load_fb."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Load_fc='".$load_fc."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Cos_fi='".$cos_fi."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Kol_turn_disk='".$kol_turn_disk."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Dimension SET Power_consum='".$power_consum."' WHERE Obj_id_dimen ='".$id_obj."' AND Obj_Cons_id_dimen='".$user_id."';");

	  			return 'Edit_dim';
	
				exit();
	  		}
	  		
	  		else 
			{
				return 'Err-edit-dim';
				exit();
	  		}

		}

		function edit_transfor_cur($user_id,$id_obj)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($user_id) AND !empty($id_obj))
	  		{
	  			global $type;
	  			global $mark;
	  			global $denomin;
	  			global $year_rel;
	  			global $date_gospr;
	  			global $date_next;
	  			global $fa_cur;
	  			global $fb_cur;
	  			global $fc_cur;
	  			global $phase;

	  			$type_tr=mysqli_fetch_array(mysqli_query($connect,"select Type_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$mark_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Mark_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$denomin_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Denomin_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$year_release_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Year_release_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$date_gospr_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Date_gospr_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$date_next_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Date_next_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$num_tr_cur_fa=mysqli_fetch_array(mysqli_query($connect,"select Num_tr_cur_fa from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			// echo "select Num_tr_cur_fa from Transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';";

	  			$num_tr_cur_fb=mysqli_fetch_array(mysqli_query($connect,"select Num_tr_cur_fb from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			// echo "select Num_tr_cur_fb from Transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';";

	  			$num_tr_cur_fc=mysqli_fetch_array(mysqli_query($connect,"select Num_tr_cur_fc from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));
	  			
	  			// echo "select Num_tr_cur_fc from Transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';";

	  			$phase_tr_cur=mysqli_fetch_array(mysqli_query($connect,"select Phase_tr_cur from transfor_cur WHERE  Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';"));

	  			$type=$type_tr["Type_tr_cur"];
	  			$mark=$mark_tr_cur["Mark_tr_cur"];
	  			$denomin=$denomin_tr_cur["Denomin_tr_cur"];
	  			$year_rel=$year_release_tr_cur["Year_release_tr_cur"];
	  			$date_gospr=$date_gospr_tr_cur["Date_gospr_tr_cur"];
	  			$date_next=$date_next_tr_cur["Date_next_tr_cur"];
	  			$fa_cur=$num_tr_cur_fa["Num_tr_cur_fa"];
	  			$fb_cur=$num_tr_cur_fb["Num_tr_cur_fb"];
	  			$fc_cur=$num_tr_cur_fc["Num_tr_cur_fc"];
	  			$phase=$phase_tr_cur["Phase_tr_cur"];
	  		}

		}

		function edit_transfor_vol($id_tr_vol)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($id_tr_vol))
	  		{
	  			global $type_tr;
	  			global $mark_tr;
	  			global $denomin_tr;
	  			global $plomb_tr;

	  			$type_vol=mysqli_fetch_array(mysqli_query($connect,"select Type_tr_vol from transfor_vol WHERE  id_tr_vol ='".$id_tr_vol."' ;"));

	  			$mark_vol=mysqli_fetch_array(mysqli_query($connect,"select Mark_tr_vol from transfor_vol WHERE  id_tr_vol ='".$id_tr_vol."' ;"));

	  			$den_vol=mysqli_fetch_array(mysqli_query($connect,"select Denomin_tr_vol from transfor_vol WHERE  id_tr_vol ='".$id_tr_vol."';"));

	  			$pl_vol=mysqli_fetch_array(mysqli_query($connect,"select Plomb_tr_vol from transfor_vol WHERE  id_tr_vol ='".$id_tr_vol."';"));

	  			$type_tr=$type_vol["Type_tr_vol"];
	  			$mark_tr=$mark_vol["Mark_tr_vol"];
	  			$denomin_tr=$den_vol["Denomin_tr_vol"];
	  			$plomb_tr=$pl_vol["Plomb_tr_vol"];

	  		}
	  	}

		function edit_transfor_cur_update ($Type_tr_cur,$Mark_tr_cur,$Denomin_tr_cur,$Year_release_tr_cur,$Num_tr_cur_fa,$Num_tr_cur_fb,$Num_tr_cur_fc,$id_obj,$user_id)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($Type_tr_cur) AND !empty($Mark_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Year_release_tr_cur) AND !empty($Num_tr_cur_fa) AND !empty($Num_tr_cur_fb) AND !empty($Num_tr_cur_fc)  AND !empty($id_obj) AND !empty($user_id))
	  		{
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Type_tr_cur='".$Type_tr_cur."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Mark_tr_cur='".$Mark_tr_cur."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Denomin_tr_cur='".$Denomin_tr_cur."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Year_release_tr_cur='".$Year_release_tr_cur."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Num_tr_cur_fa='".$Num_tr_cur_fa."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Num_tr_cur_fb='".$Num_tr_cur_fb."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Transfor_cur SET Num_tr_cur_fc='".$Num_tr_cur_fc."' WHERE Obj_id_tr_cur ='".$id_obj."' AND Obj_Cons_id_tr_cur='".$user_id."';");
				

				return 'Edit_tr_cur';
	
				exit();
	  		}
	  		
	  		else 
			{
				return 'Err-edit_tr_cur';
				exit();
	  		}

		}

		function edit_transfor_vol_update($Type_tr_vol,$Mark_tr_vol,$Denomin_tr_vol,$Plomb_tr_vol,$id_obj,$user_id)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($Type_tr_vol) AND !empty($Mark_tr_vol) AND !empty($Denomin_tr_vol) AND !empty($Plomb_tr_vol) AND !empty($id_obj) AND !empty($user_id))
	  		{
	  			mysqli_query($connect,"UPDATE Transfor_vol SET Type_tr_vol='".$Type_tr_vol."' WHERE Object_id_tr_vol ='".$id_obj."' AND Cons_id_obj_tr_vol='".$user_id."';");

	  			mysqli_query($connect,"UPDATE Transfor_vol SET Mark_tr_vol='".$Mark_tr_vol."' WHERE Object_id_tr_vol ='".$id_obj."' AND Cons_id_obj_tr_vol='".$user_id."';");

	  			mysqli_query($connect,"UPDATE Transfor_vol SET Denomin_tr_vol='".$Denomin_tr_vol."' WHERE Object_id_tr_vol ='".$id_obj."' AND Cons_id_obj_tr_vol='".$user_id."';");

	  			mysqli_query($connect,"UPDATE Transfor_vol SET Plomb_tr_vol='".$Plomb_tr_vol."' WHERE Object_id_tr_vol ='".$id_obj."' AND Cons_id_obj_tr_vol='".$user_id."';");

	  		return 'Edit';
	
				exit();
	  		}
	  		
	  		else 
			{
				return 'Err';
				exit();
	  		}
		}

		function edit_plombs($id_tr_cur,$id_plomb,$phase)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($id_tr_cur) AND !empty($id_plomb) AND !empty($phase))
	  		{
	  			global $L1_pl;
	  			global $L2_pl;
	  			global $I1_pl;
	  			global $I2_pl;
	  			global $other_pl;

	  			$l1=mysqli_fetch_array(mysqli_query($connect,"Select t2.L1 from phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";"));
	  			// echo "Select t2.L1 from Phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";";

	  			$l2=mysqli_fetch_array(mysqli_query($connect,"Select t2.L2 from phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";"));
	  			$i1=mysqli_fetch_array(mysqli_query($connect,"Select t2.I1 from phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";"));
	  			$i2=mysqli_fetch_array(mysqli_query($connect,"Select t2.I2 from phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";"));
	  			$other=mysqli_fetch_array(mysqli_query($connect,"Select t2.Other_places_plomb from phase_tr_cur AS t1 join Plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur." AND t1.Phase=".$phase.";"));

	  			$L1_pl=$l1["L1"];
	  			$L2_pl=$l2["L2"];
	  			$I1_pl=$i1["I1"];
	  			$I2_pl=$i2["I2"];
	  			$other_pl=$other["Other_places_plomb"];

	  		}

		}

		function edit_plombs_update($l1,$l2,$I1,$I2,$other,$id_tr_cur,$id_plomb,$phase) 
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();

	  		if (!empty($l1) AND !empty($l2) AND !empty($I1) AND !empty($I2) AND !empty($other) AND !empty($id_tr_cur) AND !empty($id_plomb) AND !empty($phase))
	  		{
	  			mysqli_query($connect,"UPDATE Plombs SET L1='".$l1."' WHERE id_plomb ='".$id_plomb."';");
	  			// echo "UPDATE Plombs SET L1='".$l1."' WHERE id_plomb ='".$id_plomb."' AND Tr_cur_id_plomb='".$id_tr_cur."';";
	  			mysqli_query($connect,"UPDATE Plombs SET L2='".$l2."' WHERE id_plomb ='".$id_plomb."';");
	  			mysqli_query($connect,"UPDATE Plombs SET I1='".$I1."' WHERE id_plomb ='".$id_plomb."';");
	  			mysqli_query($connect,"UPDATE Plombs SET I2='".$I2."' WHERE id_plomb ='".$id_plomb."';");
	  			mysqli_query($connect,"UPDATE Plombs SET Other_places_plomb='".$other."' WHERE id_plomb ='".$id_plomb."';");
	  			mysqli_query($connect,"UPDATE Phase_tr_cur SET Phase=".$phase." WHERE Transfor_cur_id_phase=".$id_tr_cur." AND Phase_id_plomb=".$id_plomb.";");

	  			return 'Edit';
	
				exit();
	  		}
	  		else 
			{
				return 'Err';
				exit();
	  		}

		}


		function edit_change_cunter($id_change)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($id_change))
	  		{
	  			global $date_change;
	  			global $cause;
	  			global $fio_change;
	  			global $nom_old;
	  			global $nom_new;

	  			$Date_change_count=mysqli_fetch_array(mysqli_query($connect,"select Date_change from change_count WHERE  id_change ='".$id_change."';"));
	  			$Cause_change_count=mysqli_fetch_array(mysqli_query($connect,"select Cause_change from change_count WHERE  id_change ='".$id_change."';"));
	  			$FIO_change_count=mysqli_fetch_array(mysqli_query($connect,"select FIO_change from change_count WHERE  id_change ='".$id_change."';"));
	  			$Nomber_old_count=mysqli_fetch_array(mysqli_query($connect,"select Nomber_old from change_count WHERE  id_change ='".$id_change."';"));
	  			$Nomber_new_count=mysqli_fetch_array(mysqli_query($connect,"select Nomber_new from change_count WHERE  id_change ='".$id_change."';"));

	  			$date_change=$Date_change_count["Date_change"];
	  			$cause=$Cause_change_count["Cause_change"];
	  			$fio_change=$FIO_change_count["FIO_change"];
	  			$nom_old=$Nomber_old_count["Nomber_old"];
	  			$nom_new=$Nomber_new_count["Nomber_new"];


	  		}

		}

		function edit_change_count_update($Date_change,$Cause_change,$FIO_change,$Nomber_old,$Nomber_new,$id_change)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($Date_change) AND !empty($Cause_change) AND !empty($FIO_change) AND !empty($Nomber_old) AND !empty($Nomber_new) AND !empty($id_change))
	  		{
	  			mysqli_query($connect,"UPDATE Change_count SET Date_change='".$Date_change."' WHERE id_change ='".$id_change."';");
	  			mysqli_query($connect,"UPDATE Change_count SET Cause_change='".$Cause_change."' WHERE id_change ='".$id_change."';");
	  			mysqli_query($connect,"UPDATE Change_count SET FIO_change='".$FIO_change."' WHERE id_change ='".$id_change."';");
	  			mysqli_query($connect,"UPDATE Change_count SET Nomber_old='".$Nomber_old."' WHERE id_change ='".$id_change."';");
	  			mysqli_query($connect,"UPDATE Change_count SET Nomber_new='".$Nomber_new."' WHERE id_change ='".$id_change."';");
				return 'Edit';
	
				exit();
	  		}
	  			else 
			{
				return 'Err';
				exit();
	  		}

		}

		function edit_all_date($id_all,$id_date_list,$type_all,$type_pr)
		{

			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if(!empty($id_all) AND !empty($id_date_list) AND !empty($type_all) AND !empty($type_pr))
	  		{

	  			global $date_all;
	  			global $conclusio_all;
	  			global $notes_all;

	  			if($type_pr==1)
	  			{
	  				$Date_all=mysqli_fetch_array(mysqli_query($connect,"select t2.Date_l from all_dates as t1 join Date_list as t2 join Type_date as t3 on t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type WHERE t1.Counter_id_count='".$id_all."' AND t1.Date_list_id='".$id_date_list."' AND id_Type='".$type_all."';"));

	  				//var_dump($Date_all);
	  				$Conclusio_all=mysqli_fetch_array(mysqli_query($connect,"Select Conclusio from all_dates where Date_list_id='".$id_date_list."' AND Counter_id_count='".$id_all."';"));
	  				//var_dump($Conclusio_all);
	  				$Notes_all=mysqli_fetch_array(mysqli_query($connect,"Select Notes from all_dates where Date_list_id='".$id_date_list."' AND Counter_id_count='".$id_all."';"));
	  				//var_dump($Notes_all);

	  				$date_all=$Date_all["Date_l"];
	  				//var_dump($date_all);
	  				$conclusio_all=$Conclusio_all["Conclusio"];
	  				//var_dump($conclusio_all);
	  				$notes_all=$Notes_all["Notes"];
	  				//var_dump($notes_all);
	  			}
	  			if($type_pr==2)
	  			{
	  				$Date_all=mysqli_fetch_array(mysqli_query($connect,"select t2.Date_l from all_dates as t1 join Date_list as t2 join Type_date as t3 on t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type WHERE t1.Transfor_cur_id='".$id_all."' AND t1.Date_list_id='".$id_date_list."' AND id_Type='".$type_all."';"));
	  				$Conclusio_all=mysqli_fetch_array(mysqli_query($connect,"Select Conclusio from all_dates where Date_list_id='".$id_date_list."' AND Transfor_cur_id='".$id_all."';"));
	  				$Notes_all=mysqli_fetch_array(mysqli_query($connect,"Select Notes from all_dates where Date_list_id='".$id_date_list."' AND Transfor_cur_id='".$id_all."';"));

	  				$date_all=$Date_all["Date_l"];
	  				$conclusio_all=$Conclusio_all["Conclusio"];
	  				$notes_all=$Notes_all["Notes"];

	  			}
	  			if($type_pr==3)
	  			{
	  				$Date_all=mysqli_fetch_array(mysqli_query($connect,"select t2.Date_l from all_dates as t1 join Date_list as t2 join Type_date as t3 on t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type WHERE t1.Transfor_vol_id='".$id_all."' AND t1.Date_list_id='".$id_date_list."' AND id_Type='".$type_all."';"));
	  				$Conclusio_all=mysqli_fetch_array(mysqli_query($connect,"Select Conclusio from all_dates where Date_list_id='".$id_date_list."' AND Transfor_vol_id='".$id_all."';"));
	  				$Notes_all=mysqli_fetch_array(mysqli_query($connect,"Select Notes from all_dates where Date_list_id='".$id_date_list."' AND Transfor_vol_id='".$id_all."';"));

	  				$date_all=$Date_all["Date_l"];
	  				$conclusio_all=$Conclusio_all["Conclusio"];
	  				$notes_all=$Notes_all["Notes"];

	  			}
	  		}

		}

		function edit_all_dates_ok($Type,$Date,$Conclusio,$Notes,$id_date_list)
		{
			include_once "../Controller/connection.php";
	  		$connect = get_connect();
	  		if (!empty($Type) AND !empty($Date) AND !empty($Conclusio) AND !empty($Notes) AND !empty($id_date_list))
	  		{
	  				mysqli_query($connect,"UPDATE All_dates SET Conclusio='".$Conclusio."' where Date_list_id='".$id_date_list."';");
	  				// echo "UPDATE All_dates SET Conclusio='".$Conclusio."' where Date_list_id='".$id_date_list."';";
	  				mysqli_query($connect,"UPDATE All_dates SET Notes='".$Notes."' where Date_list_id='".$id_date_list."';");
	  				// echo "UPDATE All_dates SET Notes='".$Notes."' where Date_list_id='".$id_date_list."';";
	  				mysqli_query($connect,"UPDATE Date_list SET Date_l='".$Date."' where id_Date='".$id_date_list."';");
	  				// echo "UPDATE Date_list SET Date_l='".$Date."' where id_Date='".$id_date_list."';";
	  				mysqli_query($connect,"UPDATE Date_list SET Type_date_id='".$Type."' where id_Date='".$id_date_list."';");
	  				// echo "UPDATE Date_list SET Type_date_id='".$Type."' where id_Date='".$id_date_list."';";

	  			return 'Edit';
				exit();
	  		}
	  		else 
			{
				return 'Err';
				exit();
	  		}
		}

?>