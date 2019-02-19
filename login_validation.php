<?php
session_start();
//connect to db
include("includes/dbconnect.php");

//receive form data

$email=$_POST['user_ka_email'];
$password=$_POST['user_ka_password'];

//perform query
$query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

$result=mysqli_query($conn, $query);

$num_rows=mysqli_num_rows($result);

//respond accodingly
if($num_rows==1)
{
	$row=mysqli_fetch_assoc($result);
	$query3="UPDATE `users` SET `status`=1 WHERE `email` LIKE '$email'";
	mysqli_query($conn, $query3);
	$_SESSION['name']=$row['name'];
	$_SESSION['user_id']=$row['user_id'];
	header("Location: profile.php");
}
else
{
	header('Location: login.php?msg=1');
}



?>