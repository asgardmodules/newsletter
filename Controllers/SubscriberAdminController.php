<?php
/**
@Prefix('admin/subscribers')
*/
class SubscriberAdminController extends \Asgard\Admin\Libs\Controller\EntityAdminController {
	static $_entity = 'Asgard\Newsletter\Entities\Subscriber';
	static $_entities = 'subscribers';
	
	public function __construct() {
		$this->_messages = array(
			'modified'			=>	__('Subscriber modified with success.'),
			'created'			=>	__('Subscriber created with success.'),
			'many_deleted'			=>	__('Subscribers deleted with success.'),
			'deleted'			=>	__('Subscriber deleted with success.'),
			'unexisting'			=>	__('This subscriber does not exist.'),
		);
		parent::__construct();
	}
	
	public function formConfigure($entity) {
		$form = new \Asgard\Admin\Libs\Form\AdminEntityForm($entity, $this);
		
		return $form;
	}
}