<?php
$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "";
$dBName = "dbase";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

class LoginTest extends \PHPUnit\Framework\TestCase{
	
	public function testEmptyInputLogin(){
		$sql = "SELECT * FROM users WHERE userUid = ? OR usersEmail = ?;";
 		
		
		   $user= 'hori';
		   $password = 'hhh';
		   
	    $this->assertEquals('hori',$user);
	    $this->assertEquals('hhh',$password);
	}
}
