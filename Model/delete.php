<?php
 	function del_cons($id_cons)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from consumer where id_consumer=".$id_cons.";");

			return 'Del_cons';
	
			exit();
		}
		else 
			{
				return 'Err_del-cons';
				exit();
			}
	}

	function del_object($id_cons)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from object where id_object=".$id_cons.";");

			return 'Del_obj';
	
			exit();
		}
		else 
			{
				return 'Err_del-obj';
				exit();
			}
	}

		function del_counter($id_count,$id_obj)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_count) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from counter where Obj_Cons_id_count=".$id_count." AND Obj_id_count=".$id_obj.";");

			return 'Del_counter';
	
			exit();
		}
		else 
			{
				return 'Err_del-counter';
				exit();
			}
	}

	function del_dimension ($id_dim,$id_obj)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_dim) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from dimension where Obj_Cons_id_dimen=".$id_dim." AND Obj_id_dimen=".$id_obj.";");

			return 'Del_dim';
	
			exit();
		}
		else 
			{
				return 'Err_del-dim';
				exit();
			}
	}

	function del_transfor_cur($id_tr_cur,$id_obj)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_tr_cur) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from transfor_cur where Obj_Cons_id_tr_cur=".$id_tr_cur." AND Obj_id_tr_cur=".$id_obj.";");

			return 'Del_tr_cur';
	
			exit();
		}
		else 
			{
				return 'Err_tr_cur';
				exit();
			}

	}

	function del_transfor_vol($id_tr_vol)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_tr_vol))
		{
			mysqli_query($connect,"delete from transfor_vol where id_tr_vol=".$id_tr_vol.";");

			return 'Del';
	
			exit();
		}
		else 
			{
				return 'Err';
				exit();
			}

	}

	function del_plombs($id_tr_cur,$id_plomb,$phase)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if (!empty($id_tr_cur) AND !empty($id_plomb) AND !empty($phase))
		{	
			mysqli_query($connect,"delete from phase_tr_cur where Phase_id_plomb=".$id_plomb." AND Phase=".$phase." AND Transfor_cur_id_phase=".$id_tr_cur.";");
			
			// echo "delete from phase_tr_cur where Phase_id_plomb=".$id_plomb." AND Phase=".$phase." AND Transfor_cur_id_phase=".$id_tr_cur.";";

			mysqli_query($connect,"delete from plombs where id_plomb=".$id_plomb.";");
			
			 // echo "delete from plombs where id_plomb=".$id_plomb.";";

			
			// echo "delete from Plombs where id_plomb=".$id_plomb." AND Tr_cur_id_plomb=".$id_tr_cur.";";

			return 'Del';
	
			exit();
		}
		else 
			{
				return 'Err';
				exit();
			}
	}


	function del_change_count($id_change)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if(!empty($id_change))
		{
			mysqli_query($connect,"delete from change_count where id_change=".$id_change.";");
			return 'Del';

			//echo 'delete from Change_count where id_change=".$id_change.";';
	
			exit();
		}
		else 
			{
				return 'Err';
				exit();
			}

	}

	function del_all_dates($id_all,$id_date_list,$type_pr)
	{
		include_once "../Controller/connection.php";
		$connect = get_connect();
		if(!empty($id_all) AND !empty($id_date_list) AND !empty($type_pr))
		{
			if($type_pr==1)
			{
				mysqli_query($connect,"delete from all_dates where Date_list_id=".$id_date_list." AND Counter_id_count=".$id_all.";");
				mysqli_query($connect,"delete from date_list where id_Date=".$id_date_list.";");
				// echo "delete from All_dates where Date_list_id=".$id_date_list." AND Counter_id_count=".$id_all.";";
			return 'Del';

			}
			if($type_pr==2)
			{
				mysqli_query($connect,"delete from all_dates where Date_list_id=".$id_date_list." AND Transfor_cur_id=".$id_all.";");
				mysqli_query($connect,"delete from date_list where id_Date=".$id_date_list.";");
				// echo "delete from All_dates where Date_list_id=".$id_date_list." AND Transfor_cur_id=".$id_all.";";
			return 'Del';

			}
			if($type_pr==3)
			{
				mysqli_query($connect,"delete from all_dates where Date_list_id=".$id_date_list." AND Transfor_vol_id=".$id_all.";");
				mysqli_query($connect,"delete from date_list where id_Date=".$id_date_list.";");
				// echo "delete from All_dates where Date_list_id=".$id_date_list." AND Transfor_vol_id=".$id_all.";";
			return 'Del';

			}
			else 
			{
				return 'Err';
				exit();
			}

		}
	}
?>

