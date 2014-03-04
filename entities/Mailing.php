<?php
class Mailing extends \Asgard\Core\Entity {
	static $properties = array(
		'title',
		'content',
		'plaintext' => array(
			'required'	=>	false,
		),
	);
	
		#General
	public function __toString() {
		return $this->title;
	}	
}