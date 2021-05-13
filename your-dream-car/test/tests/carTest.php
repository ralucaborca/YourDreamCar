<?php
require_once "../includes/functions.inc.php";

class CarsTest extends \PHPUnit\Framework\TestCase{
	
	
	
	public function testEmptyInputCar(){
		
	   $brand= '';
	   $model = '';
	   $year = '';   
    	   $this->assertEquals(true,emptyInputCar($brand, $model, $year));
	   
           $brand1='brand';
	   $model1='model'; 
	   $year1 = 'year';
	   $this->assertEquals(false,emptyInputCar($brand1, $model1, $year1));
	}
	
	

	
}
