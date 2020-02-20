  <?php
 function ident_user($user_value,$password_value)
	{
			include_once "../Controller/connection.php";
			$connect = get_connect();

		if (!empty($user_value) AND !empty($password_value))
		{
			$login = mysqli_real_escape_string($connect,htmlspecialchars($user_value));
			$password = mysqli_real_escape_string($connect,htmlspecialchars($password_value));
			$pass=password_hash($password,PASSWORD_BCRYPT);
			$row = mysqli_fetch_array(mysqli_query($connect,"select * from user where Name='".$login."';"), MYSQLI_NUM);
				
			if (count($row)!=0)
			{
		  		return 'ERR_3';//'Выбранный логин уже зарегистрирован!';
				exit();
			}
			else
			{
				mysqli_query($connect,"INSERT INTO user (Name, Password) VALUES ('$login','$pass');");

		  		return 'Zar';//'Вы успешно зарегистрированы!';
	
				exit();
			}
		}
	}
?>
