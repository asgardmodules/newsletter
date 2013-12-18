<?php
class Subscriber extends \Coxis\Core\Entity {
	static $properties = array(
		'email'
	);
	
	#General
	public function __toString() {
		return (string)$this->email;
	}	
}