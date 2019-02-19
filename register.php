<?php
session_start();
if(isset($_SESSION['name']))
{
    header('Location: profile.php');
}

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

  <body style="background-color:#34495e">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Friends</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        
        
      </div>
    </nav>

    <div class="container">
        <div class="row mt-100">
            <div class="col-md-8">
                <h1 class="ex-large">Life is too long and boring. Let's be friends.</h1>
            </div>
            <div class="col-md-4">
                <h3 class="text-white">Create an Account</h3>
                <?php
                if(isset($_GET['msg']))
                {
                    if($_GET['msg']==1)
                    {
                        echo "<p style='color:red'>EMail already exists</p>";
                    }
                    else if ($_GET['msg']==2) {
                        echo "<p style='color:red'>Unsupported format</p>";
                    }
                    else
                    {
                        echo "<p style='color:red'>SOme error occured</p>";
                    }
                    
                }

                ?>
                <form class="form" action="reg_validation.php" method="POST" enctype="multipart/form-data">
                    <label class="text-white">Name: </label><br>
                    <input type="text" class="form-control" name="user_ka_name"><br>
                    <label class="text-white">Email: </label><br>
                    <input type="email" class="form-control" name="user_ka_email"><br>
                    <label class="text-white">Password: </label><br>
                    <input type="password" class="form-control" name="user_ka_password"><br>
                    <label class="text-white">Profile Pic: </label><br>
                    <input type="file" class="form-control" name="user_ka_pic"><br>
                    <input type="submit" value="Create Account" class="btn btn-danger btn-block btn-lg"> 
                </form>
                <p class="text-white">Already have an account? <a href="login.php">Login Here</a></p>
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
