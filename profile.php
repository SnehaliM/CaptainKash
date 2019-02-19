<?php
session_start();
if(!(isset($_SESSION['name'])))
{
    header('Location: login.php');
}
?>
<?php
//conecting to db
include("includes/dbconnect.php");
//fetching data
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM `users` WHERE `user_id`='$user_id'";

$result=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
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
                <div class="row">
                    <div class="col-md-12">
                        <img src="img/<?php echo $profile_pic; ?>" style="width:100%;height:250px">
                    </div>
                    <div class="col-md-12 mt-25">
                        <div class="card">
                            <h5 class="text-center">Profile Menu</h5>
                            <ul>
                                <li>Home</li>
                                <li><a href="view_users.php">View Users</a></li>
                                <li><a href="view_followed_users.php">View Following</a></li>
                                <li><a href="view_message.php">View Messages</a></li>
                                <li>Edit Profile</li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="p-10" action="upload_newsfeed.php" method="POST" enctype="multipart/form-data">
                                <textarea class="form-control" placeholder="What's on your mind" name="user_ka_text"></textarea><br>
                                <input type="file" class="form-control" name="user_ka_pic"><br>
                                <input type="submit" value="Post" class="btn btn-danger pull-right"> 
                            </form>
                        </div>
                    </div>

                    <?php
                    $follower_id=$_SESSION['user_id'];
                    $query="SELECT * FROM `newsfeed` n JOIN `users` u ON u.`user_id`=n.`user_id` ORDER BY n.`newsfeed_id` DESC";

                    $result=mysqli_query($conn, $query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<div class="col-md-12 mt-25">
                                <div class="card">
                                    <p class="p-10"><img src="img/'.$row['profile_pic'].'" style="width:50px;height:50px">&nbsp&nbsp<b>'.$row['name'].'</b></p>
                                    <p class="p-10">'.$row['newsfeed_text'].'</p>
                                    <img src="img/'.$row['newsfeed_img'].'" style="width:100%;height:300px">
                                </div>
                            </div>
                    ';
                    }


                    ?>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5>Friends Online</h5>
                    <?php
                    $follower_id=$_SESSION['user_id'];
                    $query="SELECT * FROM `follow` f JOIN `users` u ON u.`user_id`=f.`following_id` WHERE f.`follower_id`='$follower_id' ";

                    $result=mysqli_query($conn, $query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<div class="row p-10">
                                <div class="col-md-3">
                                    <img src="img/'.$row['profile_pic'].'" style="width:50px;height:50px">
                                </div>
                                <div class="col-md-7">
                                    <p>'.$row['name'].'</p>
                                </div>';

                        if($row['status']==1)
                        {
                            echo '<div class="col-md-2">
                                    <div style="width:20px;height:20px;background-color:#00a65a;border-radius:15px"></div>
                                </div>
                            </div>';
                        }
                                
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
