<?php
$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "";
$dBName = "dbase";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

require_once "../includes/functions.inc.php";

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

class SignUPTest extends \PHPUnit\Framework\TestCase{
	
	public function testsignup(){
 		
		 $name='x';
		 $email='x@gmail.com';
		 $username='x';
		 $password = 'hhh';
		 $password2='hhh';
	
	    $this->assertEquals('x',$name);
	    $this->assertEquals('x@gmail.com',$email); 
	    $this->assertEquals('x',$username);
	    $this->assertEquals('hhh',$password);
	    $this->assertEquals('hhh',$password2);
	}
	
	public function testPwdMatch(){
		$pwd='pass';
		$pwd1='pass';
		$pwd2='wrong';
		$this->assertEquals(false,pwdMatch($pwd,$pwd1));
		$this->assertEquals(true,pwdMatch($pwd,$pwd2));
}

}
