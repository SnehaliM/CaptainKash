<?php

session_start();

include("includes/dbconnect.php");

//receiving the variables
$name=$_POST['user_ka_name'];
$email=$_POST['user_ka_email'];
$password=$_POST['user_ka_password'];

$query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";
$result1=mysqli_query($conn,$query1);

$num_rows=mysqli_num_rows($result1);
if($num_rows==0)
{
	//code to upload the pic
	$filename=$_FILES['user_ka_pic']['name'];
	$tmp_name=$_FILES['user_ka_pic']['tmp_name'];
	echo $type=$_FILES['user_ka_pic']['type'];
	if($type=="image/png" || $type=="image/jpg")
	{
		if(move_uploaded_file($tmp_name, "img/".$filename))
		{
			$query="INSERT INTO `users` (`user_id`, `name`, `email`, `password`,`profile_pic`) VALUES (NULL, '$name', '$email', '$password','$filename')";

			if(mysqli_query($conn, $query))
			{
				header('Location: login.php');
			}
			else
			{
				header('Location: register.php?msg=0');
			}
		}
	}
	else
	{
		header('Location: register.php?msg=2');
	}
	
}
else
{
	header('Location: register.php?msg=1');
}




?>