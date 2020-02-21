<?php
include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}


$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);
$id_face=$row[0]['Face'];
$row1=object_conclusion($_GET["user_id"]);
$id_obj=$row1[0]['id_object'];
$row3=counter_conclusion($id_obj,$user_id);
$id_count=$row3[0]["id_count"];
$dimen=dimension_conclusion($id_obj,$user_id);
$tr_cur=transfor_cur_conclusion($id_obj,$user_id);
$id_tr_cur=$tr_cur[0]['id_tr_cur'];
$plombs=plombs_conclusion($id_tr_cur);
$id_plomb=$plombs[0]['id_plomb'];
$tr_vol=transfor_vol_conclusion($id_obj,$user_id);
$id_tr_vol=$tr_vol[0]['id_tr_vol'];
$change_count=change_count_conclusion($id_count);
$id_change=$change_count[0]["id_change"];
$all_dat_count=all_dates_conclusion($id_count,1);
$all_dat_tr_cur=all_dates_conclusion($id_tr_cur,2);
$all_dat_tr_vol=all_dates_conclusion($id_tr_vol,3);


?>
<!DOCTYPE html>
	<div class="container">
		<a href="..\View\import_customer.php?user_id=<?php echo (int)$user_id; ?>&id_obj=<?php echo (int)$id_obj; ?>&id_count=<?php echo (int)$id_count; ?>&id_tr_cur=<?php echo (int)$id_tr_cur; ?>&id_tr_vol=<?php echo (int)$id_tr_vol; ?>"><span class="glyphicon glyphicon-floppy-disk"></span></a>
		<div class="row">
			
			<div class="col-sm-4">	
				ФИО: <?php echo $row[0]['Name_consumer']; ?>
			</div>
			<div class="col-sm-4">	
				Телефон:<?php echo $row[0]['Phone_consumer']; ?>
			</div> 
			<div class="col-sm-4">
				<?php
					if ($id_face==1)
					{
						echo 'Юридическое лицо';
					}
					if ($id_face==2)
					{
						echo 'Физическое лицо';
					}
					if ($id_face==3)
					{
						echo 'Многоквартирный дом';
					}

				?>
				<br><a href="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>"> Удалить пользователя</a></br>
   				<a href="..\View\edit_v.php?user_id=<?php echo (int)$user_id; ?>"> Редактировать</a>
    			<?php
    			if (prov_obj($user_id)!=1)
    			{	echo '
 		 			<a href="../View/add_object.php?user_id='.$user_id.'"> Добавить объект</a>';
 		 		}
 		 		?>
 			</div>
 		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php
					if (prov_obj($user_id)==1)
					{	echo
 					'<div class="container">
 					<h4>Информация об объекте</h4>
					Собственник: '.$row1[0]['Owner_FIO'].';
					<br>Арендатор: '.$row1[0]['Renter_FIO'].';  </br>
					Название объекта: '.$row1[0]['Name_object'].';
					<br>Почтовый адрес: '.$row1[0]['Mailing_address'].';  </br>
					Контактный телефон: '.$row1[0]['Phone_object'].';
					<br>Источник питания: '.$row1[0]['Source_of_power'].';  </br>
					Класс напряжения: '.$row1[0]['Voltage_class'].';
					</div>

					<a href="..\View\del_object.php?id_obj='.$id_obj.'&user_id='.$user_id.'"> Удалить объект</a>
     				<br>
     				<a href="..\View\edit_object.php?id_obj='.$id_obj.'&user_id='.$user_id.'"> Редактировать</a>
    				 <br>';
     				if(prov_counter($id_obj,$user_id)!=1)
     					echo'
    				<a href="../View/add_counter.php?user_id='.$user_id.' &id_obj='.$id_obj.'"> Добавить счетчик</a>';
   					}
					
				?>
			</div>
			<div class="col-sm-6">
			<?php
				if (prov_counter($id_obj,$user_id)==1)
				{	echo
 					'<div class="container">
 						<h4>Информация о счетчике</h4>
						Тип: '.$row3[0]['Type_count'].';
						<br>Марка: '.$row3[0]['Mark_count'].';</br>
						Номер: '.$row3[0]['Number_count'].';
						<br>Год выпуска: '.$row3[0]['Year_release_count'].';</br>
						Класс точности: '.$row3[0]['Class_accur_count'].';
						<br>Пломбы на крышке зажимов счетчика: '.$row3[0]['Kol_plomb_gospr'].';</br>
						Количество голографичеких наклеек: '.$row3[0]['Kol_holog_stick'].';
						<br>Пломбы сетевой организации:'.$row3[0]['Plomb_netw_org'].';</br>
						Антимагнитые пломбы:'.$row3[0]['Antimag_plomb'].';
						<br>Пломба на ШУ:'.$row3[0]['Plomb_shu'].';</br>
						Другие места:'.$row3[0]['Other_places_count'].';

						<br>Место установки:'.$row3[0]['Place'].';</br>
						Основание проверки:'.$row3[0]['Base_of_verifications'].';

					
						<br>Разрядность:'.$row3[0]['Discharge'].';</br>

						<br>Показания:'.$row3[0]['Values_counter'].';</br>
					</div>

				<a href="..\View\del_counter.php?user_id='.$user_id.'&id_obj='.$id_obj.'"> Удалить счетчик</a>
     			<br>
     			<a href="..\View\edit_counter.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать счетчик</a>
    			<br>';

    			if (prov_change_count($id_count)!=1)
    			{ echo'
    				<a href="..\View\add_change_count.php?id_count='.$id_count.'&user_id='.$user_id.'"> Добавить данные о замене счетчика</a>';
    			}
    			
    			if (prov_dimension($id_obj,$user_id)!=1)
    			{ echo '
    				<br><a href="..\View\add_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.'"> Добавить данные об измерениях</a></br>';
    			}

    			echo'
    			<h4><a href="..\View\add_all_dates.php?id_all='.$id_count.'&type_pr=1&user_id='.$user_id.'"> Добавить дату о проверке счетчика</a></h4>';

    			if (prov_date($id_count,1)==1)
    			{
    				for ($i = 0; $i<count($all_dat_count); $i++) 
    				{
    					
    				echo '
    				<br>Дата: '.$all_dat_count[$i]['Date_l'].' '.$all_dat_count[$i]['Type'].';</br>
    				Заключение по учету: '.$all_dat_count[$i]['Conclusio'].';
    				<br>Примечание: '.$all_dat_count[$i]['Notes'].';</br>
    				<a href="..\View\del_all_dates.php?id_all='.$id_count.'&id_date_list='.$all_dat_count[$i]['Date_list_id'].'&type_pr=1&user_id='.$user_id.'"> Удалить дату о проверке/поверке счетчика </a>
    				<br>
    				<a href="..\View\edit_all_dates.php?id_all='.$id_count.'&type_all='.$all_dat_count[$i]['id_Type'].'&id_date_list='.$all_dat_count[$i]['Date_list_id'].'&type_pr=1&user_id='.$user_id.'"> Редактировать дату </a>
    				</br>
    				';
    				}
    			

    			}
    			if (prov_transfor_cur($id_obj,$user_id)!=1)
    			{
    			// { echo '
    			// <a href="..\View\add_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор тока</a>';
    				echo '
    			 <a href="..\View\new_add_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор тока</a>';
    			}

    			if (prov_tr_vol($id_tr_vol)!=1)
    			{echo'
    				<br>
    				<a href="..\View\add_transfor_vol.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор напряжения</a></br>';
    			}

				}
			?>
			</div>
		</div>

		<div class="row">
		<div class="col-sm-6">

		<?php
			if (prov_dimension($id_obj,$user_id)==1)
			{
			echo
 			'<div class="container">
 			<h4>Данные об измерениях</h4>
			Дата: '.$dimen[0]['Date_dimen'].';
			<br>Чередование фаз: '.$dimen[0]['Alter_phase'].';  </br>
			Нагрузка в амперах фА: '.$dimen[0]['Load_fa'].';
			<br>Нагрузка в амперах фБ: '.$dimen[0]['Load_fb'].';  </br>
			Нагрузка в амперах фС: '.$dimen[0]['Load_fc'].';
			<br>Cos фи: '.$dimen[0]['Cos_fi'].';  </br>
			Количество оборотов диска: '.$dimen[0]['Kol_turn_disk'].';
			<br>Потребляемая мощность в КВт: '.$dimen[0]['Power_consum'].';  </br>
			</div>
			<a href="..\View\del_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить данные об измерениях</a>
     		<br>
     		<a href="..\View\edit_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать данные об измерениях</a>
    		<br>';
    		

			}
		?>
		</div>

		<div class="col-sm-6">
			<?php 
				if (prov_change_count($id_count)==1)
				{
					echo 
					'<div class="container">
 					<h4>Данные о замене счетчика</h4>
 					Дата:'.$change_count[0]['Date_change'].';
 					<br>Причина замены:'.$change_count[0]['Cause_change'].';</br>
 					Кто менял (ФИО):'.$change_count[0]['FIO_change'].';
 					<br>Номер старого счетчика:'.$change_count[0]['Nomber_old'].';</br>
 					Номер нового счетчика:'.$change_count[0]['Nomber_new'].';
 					<br>
 					</div>
 					<a href="..\View\del_change_count.php?id_change='.$id_change.'&user_id='.$user_id.'"> Удалить данные о замене счетчика</a>
     				<br>
     				<a href="..\View\edit_change_count.php?id_change='.$id_change.'&user_id='.$user_id.'"> Редактировать данные о замене счетчика</a>
					';


				}
			?>
		</div>
	</div>



		<div class="row">
		<div class="col-sm-6">
			<?php
				if (prov_transfor_cur($id_obj,$user_id)==1)
				{	echo
				'<div class="container">
				<h4>Информация о трансформаторе тока</h4>
				Тип: '.$tr_cur[0]['Type_tr_cur'].';
				<br>Марка: '.$tr_cur[0]['Mark_tr_cur'].';  </br>
				Номинал: '.$tr_cur[0]['Denomin_tr_cur'].';
				<br>Год выпуска: '.$tr_cur[0]['Year_release_tr_cur'].';  </br>
				№ Трансформатора тока фА: '.$tr_cur[0]['Num_tr_cur_fa'].';
				<br>№ Трансформатора тока фБ: '.$tr_cur[0]['Num_tr_cur_fb'].';  </br>
				№ Трансформатора тока фС: '.$tr_cur[0]['Num_tr_cur_fc'].';
				</div>
				<a href="..\View\del_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить трансформатор тока</a>
     			<br>
     			<a href="..\View\edit_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать трансформатор тока</a>
    	 		<br>';
    	 		if ((prov_plombs($id_tr_cur)==0) || (prov_plombs($id_tr_cur)<3))
    	 		{
    	 			echo'
    	 		<a href="..\View\add_plombs.php?id_tr_cur='.$id_tr_cur.'&user_id='.$user_id.'"> Добавить пломбы</a>';
    	 		}
    	 		echo'
    	 		<h4><a href="..\View\add_all_dates.php?id_all='.$id_tr_cur.'&type_pr=2&user_id='.$user_id.'"> Добавить дату о проверке трансформатора тока</a></h4></br>';

    	 		if (prov_date($id_tr_cur,2)==1)
    			{
    				for ($i = 0; $i<count($all_dat_tr_cur); $i++) 
    				{
    				echo '
    				<br>Дата: '.$all_dat_tr_cur[$i]['Date_l'].' '.$all_dat_tr_cur[$i]['Type'].';</br>
    				Заключение по учету: '.$all_dat_tr_cur[$i]['Conclusio'].';
    				<br>Примечание: '.$all_dat_tr_cur[$i]['Notes'].';</br>
    				
    				<a href="..\View\del_all_dates.php?id_all='.$id_tr_cur.'&id_date_list='.$all_dat_tr_cur[$i]['Date_list_id'].'&type_pr=2&user_id='.$user_id.'"> Удалить дату о проверке/поверке трансформатора тока </a>
    				<br>
    				<a href="..\View\edit_all_dates.php?id_all='.$id_tr_cur.'&type_all='.$all_dat_tr_cur[$i]['id_Type'].'&id_date_list='.$all_dat_tr_cur[$i]['Date_list_id'].'&type_pr=2&user_id='.$user_id.'"> Редактировать дату </a>
    				</br>';
    				}
    			}
				}
			?>
		</div>
		<div class="col-sm-6">
			<?php
			if (prov_plombs($id_tr_cur)!=0)
				{ 
					for ($i = 0; $i<count($plombs); $i++) 
    				{
    					echo
						'<div class="container">
						<h4>Информация о пломбах</h4>';
						if ($plombs[$i]['Phase']==1)
						{
						echo " Фаза А";
						}
						if ($plombs[$i]['Phase']==2)
						{
						echo " Фаза Б";
						}
						if ($plombs[$i]['Phase']==3)
						{
						echo " Фаза С";
						}						
						echo '
						<br>l1: '.$plombs[$i]['L1'].';</br>
						l2: '.$plombs[$i]['L1'].';
						<br>I1: '.$plombs[$i]['I1'].';</br>
						I2: '.$plombs[$i]['I2'].';  
						<br>Другие места: '.$plombs[$i]['Other_places_plomb'].';</br>	
						</div>
						<a href="..\View\del_plombs.php?id_tr_cur='.$id_tr_cur.'&id_plomb='.$plombs[$i]['id_plomb'].' &phase='.$plombs[$i]['Phase'].'&user_id='.$user_id.'"> Удалить пломбы</a>
     					<br>
     					<a href="..\View\edit_plombs.php?id_tr_cur='.$id_tr_cur.'&id_plomb='.$plombs[$i]['id_plomb'].'&phase='.$plombs[$i]['Phase'].'&user_id='.$user_id.'"> Редактировать данные о пломбах </a>';
					}
				}
			?>
		</div>
	</div>

	<?php
	if (prov_tr_vol($id_tr_vol)==1)
		{
			echo 
			'<div class="container">
			<h4>Информация о трансформаторе напряжения</h4>
				Тип: '.$tr_vol[0]['Type_tr_vol'].';
				<br>Марка: '.$tr_vol[0]['Mark_tr_vol'].';  </br>
				Номинал: '.$tr_vol[0]['Denomin_tr_vol'].';
				<br>Пломбы: '.$tr_vol[0]['Plomb_tr_vol'].';</br>
			</div>
			<a href="..\View\del_transfor_vol.php?id_tr_vol='.$id_tr_vol.'&user_id='.$user_id.'"> Удалить трансформатор напряжения</a>
     			<br>
     			<a href="..\View\edit_transfor_vol.php?id_tr_vol='.$id_tr_vol.'&user_id='.$user_id.'&id_obj='.$id_obj.'"> Редактировать трансформатор напряжения</a>
     			<br>
     			<h4><a href="..\View\add_all_dates.php?id_all='.$id_tr_vol.'&type_pr=3&user_id='.$user_id.'"> Добавить дату о проверке трансформатора напряжения</a></h4>';

     			if (prov_date($id_tr_vol,3)==1)
    			{
    				
    				for ($i = 0; $i<count($all_dat_tr_vol); $i++) 
    				{
    				echo '
    				<br>Дата: '.$all_dat_tr_vol[$i]['Date_l'].' '.$all_dat_tr_vol[$i]['Type'].';</br>
    				Заключение по учету: '.$all_dat_tr_vol[$i]['Conclusio'].';
    				<br>Примечание: '.$all_dat_tr_vol[$i]['Notes'].';</br>
    				<a href="..\View\del_all_dates.php?id_all='.$id_tr_vol.'&id_date_list='.$all_dat_tr_vol[$i]['Date_list_id'].'&type_pr=3&user_id='.$user_id.'"> Удалить дату о проверке/поверке трансформатора напряжения </a>
    				<br>
    				<a href="..\View\edit_all_dates.php?id_all='.$id_tr_vol.'&type_all='.$all_dat_tr_vol[$i]['id_Type'].'&id_date_list='.$all_dat_tr_vol[$i]['Date_list_id'].'&type_pr=3&user_id='.$user_id.'"> Редактировать дату </a>
    				</br>';
    				

    				}
    			}

		}
	
	?>
</div>

