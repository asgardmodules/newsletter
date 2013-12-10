<?php
class Subscriber extends \Coxis\Core\Model {
	static $properties = array(
		'email'
	);
	
	#General
	public function __toString() {
		return (string)$this->email;
	}	
}