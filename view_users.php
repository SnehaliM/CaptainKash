<?php
session_start();
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

            <?php
            include("includes/dbconnect.php");

            $query="SELECT * FROM `users`";

            $result=mysqli_query($conn, $query);
            while($row=mysqli_fetch_assoc($result))
            {
                echo '<div class="col-md-3">
                        <div class="card">
                            <img src="img/'.$row['profile_pic'].'" class="img-size">
                            <h5 class="text-center">'.$row['name'].'</h5>
                            <p class="pl-15">'.$row['email'].'</p>
                            <a href="view_profile.php?user_id='.$row['user_id'].'" class="btn btn-danger btn-block">View Profile</a>
                        </div>
                    </div>';
            }

            ?>

    		

    		
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
