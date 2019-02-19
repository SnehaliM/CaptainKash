<?php 
session_start();
include("includes/dbconnect.php");

$user_id=$_SESSION['user_id'];
$text=$_POST['user_ka_text'];
//code to upload the pic
$filename=$_FILES['user_ka_pic']['name'];
$tmp_name=$_FILES['user_ka_pic']['tmp_name'];
echo $type=$_FILES['user_ka_pic']['type'];
if($type=="image/png" || $type=="image/jpg")
{
	if(move_uploaded_file($tmp_name, "img/".$filename))
	{
		$query="INSERT INTO `newsfeed` (`newsfeed_id`, `user_id`, `newsfeed_text`, `newsfeed_img`) VALUES (NULL, '$user_id', '$text', '$filename')";

		if(mysqli_query($conn, $query))
		{
			header('Location: profile.php');
		}
		else
		{
			header('Location: profile.php');
		}
	}
}
else
{
	header('Location: profile.php');
}

?>