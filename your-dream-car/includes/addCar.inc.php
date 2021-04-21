<?php

if (isset($_POST["submit"])) {
  $brand = $_POST["brand"];
  $model = $_POST["model"];
  $year  = $_POST["year"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputCar($brand, $model, $year) !== false) {
    header("location: ../addCar.php?error=emptyinput");
    exit();
  }

  addCar($brand, $model, $year);
}
else {
  header("location: ../index.php");
  exit();
}