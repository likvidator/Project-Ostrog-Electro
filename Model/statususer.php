<?php
function status_user(){
	include_once "../Controller/connection.php";
	$connect = get_connect();
	if(!empty($_COOKIE['username']))
	{
		$name =mysqli_real_escape_string($connect,$_COOKIE['username']);
		// $password=(mysqli_real_escape_string($connect,htmlspecialchars($_COOKIE['password'])));
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM user WHERE Name ='$name';"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
}
?>
