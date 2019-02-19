<?php
session_start();
if(!(isset($_SESSION['name'])))
{
    header('Location: login.php');
}
include ("includes/dbconnect.php");

$user_id=$_SESSION['user_id'];

$query="SELECT * FROM `users` WHERE `user_id`='$user_id'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$email=$row['email'];
$profile_pic=$row['profile_pic'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <?php include("includes/navbar.php"); ?>

    <div class="container">
    	<div class="row">
            <div class="col-md-3">
                <img src="img/<?php echo $profile_pic; ?>" style="width:100%;height:250px">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="row p-10">
                        <?php
                        $receiver_id=$_SESSION['user_id'];
                        $query="SELECT * FROM `message` m JOIN `users` u ON u.`user_id`=m.`sender_id` WHERE m.`receiver_id`='$receiver_id' ORDER BY m.`message_id` DESC";

                        $result=mysqli_query($conn, $query);
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo '<div class="col-md-12">
                                        <p><b>'.$row['name'].'</b></p>
                                        <p>'.$row['message_text'].'</p>
                                        <a href="view_profile.php?user_id='.$row['user_id'].'" class="btn btn-primary btn-sm">Reply</a><hr>
                                </div>';
                        }
                        ?>

                        
                </div>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
