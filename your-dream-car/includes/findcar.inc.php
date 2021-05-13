<?php
 if (isset($_POST["submit"])){
	$question1 = $_POST["q1"];
	$question2 = $_POST["q2"];
	$question3 = $_POST["q3"];
	$question4 = $_POST["q4"];
	$question5 = $_POST["q5"];

	require_once 'dbh.inc.php';
  	require_once 'functions.inc.php';
	

	


	questionsAnswers($question1,$question2,$question3,$question4,$question5);

 }  
else{
  header("location: ../findcar.php");
  exit();
}
