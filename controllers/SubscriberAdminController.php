<?php
/**
@Prefix('admin/subscribers')
*/
class SubscriberAdminController extends \Coxis\Admin\Libs\Controller\EntityAdminController {
	static $_entity = 'Coxis\Newsletter\Entities\Subscriber';
	static $_entities = 'subscribers';
	
	function __construct() {
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
		$form = new \Coxis\Admin\Libs\Form\AdminEntityForm($entity, $this);
		
		return $form;
	}
}