<?php

class Test {
	
	private static $name = 'some test123';
	
	public function testMe(){
		return static::$name;
	}
	
	
}