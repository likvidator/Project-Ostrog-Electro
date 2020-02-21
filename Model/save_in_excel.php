<?php

	function cust_concl($user_id)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$customer=mysqli_fetch_assoc(mysqli_query($connect,"select Name_consumer,Phone_consumer,Face from consumer WHERE id_consumer =".$user_id.";"));
		//var_dump($customer);
		return $customer;
		exit();

	}
	function object_concl($user_id)
	{
		 include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$object=mysqli_fetch_assoc(mysqli_query($connect,"select id_object,Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check
			FROM Object WHERE Obj_Cons_id=".$user_id.";"));
		return $object;
		exit();
	}
	function counter_concl($id_obj,$user_id)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$counter=mysqli_fetch_assoc(mysqli_query($connect,"Select id_count,Type_count, Mark_count,Number_count,Year_release_count,Class_accur_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count, Place, Accuracy_class, Discharge, Values_counter from counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"));
		return $counter;
		exit();
	}
	function all_dates_concl($id_reg,$type)
	{
		 include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		if (!empty($id_reg) AND !empty($type))
		{
			if ($type==1)
			{
				$result=(mysqli_query($connect,"select t3.id_Type,t1.Date_list_id,t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Counter_id_count=".$id_reg.";"));

			return $result;
			exit();
			}
			if ($type==2)
			{
				$result=(mysqli_query($connect,"select t3.id_Type, t1.Date_list_id,t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Transfor_cur_id=".$id_reg.";"));
				return $result;
				exit();

			}
			if ($type==3)
			{
				$result=(mysqli_query($connect,"select t3.id_Type,t1.Date_list_id,t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Transfor_vol_id=".$id_reg.";"));
				return $result;
				exit();

			}


		}
		
	}

	function dimension_concl($id_obj,$user_id)
	{

		include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$dim=mysqli_fetch_assoc(mysqli_query($connect,"Select Date_dimen, Alter_phase,Load_fa,Load_fb,Load_fc,Cos_fi,Kol_turn_disk,Power_consum from dimension WHERE Obj_id_dimen=".$id_obj." AND Obj_Cons_id_dimen=".$user_id.";"));
		return $dim;
		exit();
	}
	function change_count_concl($id_count)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$change=(mysqli_query($connect,"Select id_change,Date_change,Cause_change,FIO_change,Nomber_old,Nomber_new FROM change_count WHERE Counter_id_count=".$id_count.";"));
		return $change;
		exit();
	}
	function transfor_cur_concl($id_obj,$user_id)
	{
		 include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$tr_cur=mysqli_fetch_assoc(mysqli_query($connect,"Select id_tr_cur,Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc from transfor_cur WHERE Obj_id_tr_cur=".$id_obj." AND Obj_Cons_id_tr_cur=".$user_id.";"));
		return $tr_cur;
		exit();
	}
	function plombs_concl($id_tr_cur)
	{
		 include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL); 
		$plombs=(mysqli_query($connect,"Select t1.Phase,t2.id_plomb,t2.L1,t2.L2,t2.I1,t2.I2,t2.Other_places_plomb from phase_tr_cur AS t1 join plombs AS t2 on t1.Phase_id_plomb=t2.id_plomb where Transfor_cur_id_phase=".$id_tr_cur.";"));
		return $plombs;
		exit();
	}
	function transfor_vol_concl($id_obj,$user_id)
	{
	 include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL);
		$tr_vol=mysqli_fetch_assoc(mysqli_query($connect," Select id_tr_vol,Type_tr_vol,Mark_tr_vol,Denomin_tr_vol,Plomb_tr_vol from transfor_vol WHERE Object_id_tr_vol=".$id_obj." AND Cons_id_obj_tr_vol=".$user_id.";"));
		return $tr_vol;
		exit();
	}
	function sched_inspect2($date)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		mysqli_query ($connect,"set names cp1251");
		error_reporting(E_ALL);
		$result= mysqli_query($connect," Select * from consumer where id_consumer IN
		(Select Obj_Cons_id_tr_cur from transfor_cur where id_tr_cur IN
		(select t1.Transfor_cur_id
		from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type
			where t2.Date_l < '".$date."' AND t2.Type_date_id=3)
			UNION
			Select Cons_id_obj_tr_vol from transfor_vol Where id_tr_vol IN
			(select t1.Transfor_vol_id
			from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type
			where t2.Date_l < '".$date."' AND t2.Type_date_id=5)
			UNION
			Select Obj_Cons_id_count from counter where id_count IN
			(select t1.Counter_id_count
			from all_dates AS t1 join date_list AS t2 join type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type
			where t2.Date_l < '".$date."' AND t2.Type_date_id=1 ));");
		return $result;
		exit();
	}

?>