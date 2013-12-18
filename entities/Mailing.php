<?php
class Mailing extends \Coxis\Core\Entity {
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