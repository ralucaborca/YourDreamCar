<?php
require_once "../includes/functions.inc.php";
class LogINTest extends \PHPUnit\Framework\TestCase{
	
	public function testLogin(){
		
 		$user= 'hori';
	        $password = 'hhh';
		   
	    $this->assertEquals('hori',$user);
	    $this->assertEquals('hhh',$password);
	}
	
	public function testEmptyInputLogin(){
		
	   $user= '';
	   $password = ''; 	   
    	   $this->assertEquals(true,emptyInputLogin($user, $password));
	   
           $user1='user';
	   $password1='pass'; 
	   $this->assertEquals(false,emptyInputLogin($user1, $password1));
	}
	
	

	
}
