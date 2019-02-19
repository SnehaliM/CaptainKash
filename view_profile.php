<?php
session_start();
if(!(isset($_SESSION['name'])))
{
    header('Location: login.php');
}
include ("includes/dbconnect.php");

$user_id=$_GET['user_id'];

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
                        <div class="col-md-6">
                            <p>Name: <?php echo $name; ?></p>
                            <p>Email: <?php echo $email; ?></p>
                            <?php
                            $follower_id=$_SESSION['user_id'];
                            $following_id=$_GET['user_id'];

                            $query1="SELECT * FROM `follow` WHERE `follower_id`='$follower_id' AND `following_id`='$following_id'";
                            $result1=mysqli_query($conn, $query1);

                            $num_rows1=mysqli_num_rows($result1);

                            if($num_rows1>0)
                            {
                                echo '<a href="" class="btn btn-success btn-lg">Following</a>';
                            }
                            else
                            {
                                echo '<a href="follow.php?following_user_id='.$user_id.'" class="btn btn-primary btn-lg">Follow</a>';
                            }

                            ?>
                            
                        </div>
                        <div class="col-md-6">
                            <form class="form" action="send_msg.php" method="POST">
                                <input type="hidden" name="user_ka_id" value="<?php echo $_GET['user_id']; ?>">
                                <textarea class="form-control" name="message"></textarea><br>
                                <input type="submit" value="Send Message" class="btn btn-warning btn-lg">
                            </form>
                        </div>
                    </div>
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
