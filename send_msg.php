<?php

session_start();
include("includes/dbconnect.php");

$sender_id=$_SESSION['user_id'];
$receiver_id=$_POST['user_ka_id'];
$message_text=$_POST['message'];

$query="INSERT INTO `message` (`message_id`, `sender_id`, `receiver_id`,`message_text`) VALUES (NULL, '$sender_id', '$receiver_id', '$message_text')";

mysqli_query($conn,$query);
header('Location: view_profile.php?user_id='.$receiver_id);


?>