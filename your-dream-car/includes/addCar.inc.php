<?php

if (isset($_POST["submit"])) {
  $brand = $_POST["brand"];
  $model = $_POST["model"];
  $year  = $_POST["year"];
  $cost  = $_POST["cost"];
  $fuelType  = $_POST["fuelType"];
  $horsepower = $_POST["horsepower"];
  $seats = $_POST["seats"];
  $picture = $_FILES["picture"];
  print_r($picture);
  $pictureName = $picture["name"];
  $pictureTmpName = $picture["tmp_name"];
  $pictureSize = $picture["size"];
  $pictureError = $picture["error"];
  $pictureType = $picture["type"];

  $pictureExt = explode(".",$pictureName);
  $pictureActualExt = strtolower(end($pictureExt));
  print_r($pictureActualExt);
  print_r($pictureName);
  $allowed  = array("jpg", "jpeg", "png");

  if (in_array($pictureActualExt, $allowed)) {
    if ($pictureError === 0 ) {
      if ($pictureSize < 5000000) {
        $pictureNameNew = $brand."-".$model.".".$pictureActualExt;
        print_r($pictureNameNew);
        $pictureDestination = "/opt/lampp/htdocs/YourDreamCar/your-dream-car/images/car_pictures/".$pictureNameNew;
        move_uploaded_file($pictureTmpName, $pictureDestination);
      }else{
        echo "<center><h5 class='text-light'>Your file is too big!</h5></center>";
      }
    } else{
        echo "<center><h5 class='text-light'>There was an error uploading your file!</h5></center>";
    }
  } else{
      echo "<center><h5 class='text-light'>You can upload only jpg, jpeg and png files!</h5></center>";
  }

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputCar($brand, $model, $year) !== false) {
    header("location: ../addCar.php?error=emptyinput");
    exit();
  }

  addCar($conn, $brand, $model, $year, $cost, $fuelType, $horsepower, $seats);
}
else {
  header("location: ../index.php");
  exit();
}