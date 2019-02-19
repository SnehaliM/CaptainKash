<?php
session_start();
include ("includes/dbconnect.php");

$follower_id=$_SESSION['user_id'];
$following_id=$_GET['following_user_id'];

$query="INSERT INTO `follow` (`id`, `follower_id`, `following_id`) VALUES (NULL, '$follower_id', '$following_id')";

mysqli_query($conn, $query);
header('Location: view_profile.php?user_id='.$following_id);




?>