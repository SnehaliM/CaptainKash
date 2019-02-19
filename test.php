<?php

$email=$_POST['user_ka_email'];
$password=$_POST['user_ka_password'];

if($email=="admin@mywbut.com" && $password=="12345")
{
	echo "Welcome";
}
else
{
	echo "Bhag sale";
}
?>