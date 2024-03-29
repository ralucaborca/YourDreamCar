<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
  $result;
  if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUid($username){
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat){
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function uidExists($conn, $username, $email){
  $sql = "SELECT * FROM users WHERE userUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
  $sql = "INSERT INTO users (usersName, usersEmail, userUid, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}

function emptyInputLogin($username, $pwd){
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd){
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["usersPwd"];
  $checkPwd =  password_verify($pwd,$pwdHashed);

  if ($checkPwd === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["useruid"] = $uidExists["userUid"];
    header("location: ../index.php");
    exit();
  }
}

function emptyInputCar($brand, $model, $year){
  $result;
  if (empty($brand) || empty($model) || empty($year)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function addCar($conn, $brand, $model, $year, $cost, $fuelType, $horsepower, $seats){
    $sql = "INSERT INTO cars (carBrand, carModel, carYear, carCost, carFuelType, carHorsePower, carSeats) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../addCar.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $brand, $model, $year, $cost, $fuelType, $horsepower, $seats);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addCar.php?error=none");
    exit();
  }

function showCars($conn){
    $sql = "SELECT * FROM cars;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<center><h1 class='text-light' style='background-color: black'>" . $row['carBrand'] ." ". $row['carModel']. "</h1><center>";
        echo "<center><h3 class='text-light' style='background-color: black'>Year: ".$row['carYear']."</h3></center>";
        echo "<center><h3 class='text-light' style='background-color: black'>Cost: ".$row['carCost']."$</h3></center>";
        echo "<center><h3 class='text-light' style='background-color: black'>Fuel type: ".$row['carFuelType']."</h3></center>";
        echo "<center><h3 class='text-light' style='background-color: black'>Horsepower: ".$row['carHorsepower']."</h3></center>";
        echo "<center><h3 class='text-light' style='background-color: black'>Seats: ".$row['carSeats']."</h3></center>";
        echo "<center><img src='images/car_pictures/".$row['carBrand']."-".$row['carModel'].".jpg' width='500' height='300'"."></center>";
        
      }
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();
  }

function emptyInputFindCar($question1,$question2,$question3,$question4,$question5,$question6){
  $result;
  if (empty($question1) || empty($question2) || empty($question3) || empty($question4) || empty($question5) || empty($question6) ) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function questionsAnswers($question1,$question2,$question3,$question4,$question5,$question6){

  $result=0;
  if($question1 == "<18")
 { header("location: ../findcar.php?error=<18");}
  if($question2 == "5000-15000") 
 { $result++;}
  if($question3 == "2") 
 { $result++;}
  if($question4 == "10000-15000") 
 { $result++;}
  if($question5 == "no") 
 { $result++;}
  if($question6 == "performance") 
 { $result++;}
  echo "<p>The answer is:" . $result . "<br />\n </p>";
}
