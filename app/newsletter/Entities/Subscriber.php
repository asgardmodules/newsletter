<?php
class Subscriber extends \Asgard\Core\Entity {
	static $properties = array(
		'email'
	);
	
	#General
	public function __toString() {
		return (string)$this->email;
	}	
}