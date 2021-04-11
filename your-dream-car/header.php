<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>YourDreamCar</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #000000">
    <div></div>
    <nav class="navbar navbar-dark navbar-expand-md text-black-50 bg-dark" id="NavBar">
        <div class="container-fluid"><a class="navbar-brand" href="index.php">YourDreamCar</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Cars.php">Cars</a></li>
                </ul>
                  <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "</ul>
                      <ul class='nav navbar-nav'>
                          <li class='nav-item' role='presentation'><a class='nav-link active' href='includes/logout.inc.php'><b>Log out</b></a></li>
                      </ul>";
                      echo "</ul>
                      <ul class='nav navbar-nav'>
                          <li class='nav-item' role='presentation'><a class='nav-link active' href='post.php'><b>Add car</b></a></li>
                      </ul>";
                      if(($_SESSION["useruid"])){
                        echo "</ul>
                        <ul class='nav navbar-nav'>
                            <li class='nav-item' role='presentation'><a class='nav-link active' href='delete.php'><b>Delete car</b></a></li>
                        </ul>";
                      }
                    }
                    else {
                      echo "</ul>
                      <ul class='nav navbar-nav'>
                          <li class='nav-item' role='presentation'><a class='nav-link active' href='login.php'><b>Log in</b></a></li>
                      </ul>";
                      echo "</ul>
                      <ul class='nav navbar-nav'>
                          <li class='nav-item' role='presentation'><a class='nav-link active' href='signup.php'><b>Sign up</b></a></li>
                      </ul>";
                    }
                  ?>
    </nav>
