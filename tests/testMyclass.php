<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


use WpNounces\Nacho;

class NachoTest extends PHPUnit_Framework_TestCase {

public function testNachHasCheese()  
{  
$nacho = new Nacho;  
$this->assertTrue($nacho->hasCheese());  
}

}  