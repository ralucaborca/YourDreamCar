<?php

require_once "../includes/functions.inc.php";



class SignUPTest extends \PHPUnit\Framework\TestCase{
	
	public function testPwdMatch(){
		$pwd='pass';
		$pwd1='pass';
		$pwd2='wrong';
		$this->assertEquals(false,pwdMatch($pwd,$pwd1));
		$this->assertEquals(true,pwdMatch($pwd,$pwd2));
}
	
	public function testInvalidEMail(){
		$correct_email='name@mail.com';
		$wrong_email='OhNo.org';

		$this->assertEquals(false,invalidEMail($correct_email));
		$this->assertEquals(true,invalidEMail($wrong_email));
	}

	public function testInvalidUid(){
		$correct_uid='User123';
		$wrong_uid='_WRONG_';

		$this->assertEquals(false,invalidUid($correct_uid));
		$this->assertEquals(true,invalidUid($wrong_uid));
	}

}
