<?php
/**
@Prefix('admin/newsletter')
*/
class NewsletterAdminController extends \Asgard\Admin\Libs\Controller\EntityAdminController {
	static $_entity = 'Asgard\Newsletter\Entities\Mailing';
	static $_entities = 'mailings';
	
	public function __construct() {
		$this->_messages = array(
			'modified'			=>	__('Mailing modified with success.'),
			'created'			=>	__('Mailing sent with success.'),
			'many_deleted'			=>	__('Mailings modified with success.'),
			'deleted'			=>	__('Mailing deleted with success.'),
			'unexisting'			=>	__('This mailing does not exist.'),
		);
		parent::__construct();
	}
	
	public function formConfigure($entity) {
		$form = new \Asgard\Admin\Libs\Form\AdminEntityForm($entity, $this);
		return $form;
	}
	
	public function test($subject) {
		$email = \Asgard\Core\App::get('post')->get('testmail');
		$html = $this->form->content->getValue();
		$html = str_replace('src="/', 'src="'.\Asgard\Core\App::get('url')->base(), $html);
		$html = View::render('app/newsletter/views/newsletteradmin/newsletter.php', array('content'=>$html, 'key'=>'', 'subscriber_id'=>0, 'id'=>0));
		$html = str_replace('src="/web/', 'src="'.URL::base(), $html);
		Email::create($email, \Value::val('email'), $subject, $this->form->plaintext->getValue(), $html)->send();
	}
	
	public function envoi($subject) {
		$subscribers = Subscriber::all();
		foreach($subscribers as $subscriber) {
			$key = sha1(Config::get('key').$subscriber->id);
			$html = $this->form->content->getValue();
			$html = str_replace('src="/', 'src="'.\Asgard\Core\App::get('url')->base(), $html);
			$html = $this->render('app/newsletter/views/newsletteradmin/newsletter.php', array('content'=>$html, 'subscriber_id'=>$subscriber->id, 'key'=>$key, 'id'=>$this->mailing->id));
			$html = str_replace('src="/web/', 'src="'.URL::base(), $html);
			Email::create($subscriber->email, \Value::val('email'), $subject, $this->form->plaintext->getValue(), $html)->send();
		}
	}
	
	/**
	@Route('new')
	*/
	public function newAction($request) {
		$_entity = static::$_entity;
		
		$this->$_entity = new $_entity;
	
		$this->form = $this->formConfigure($this->$_entity);

		if($this->form->isSent())
			try {
				$this->form->save();

				$subject = $this->form->title->getValue();
				
				if(\Asgard\Core\App::get('post')->has('tous')) {
					$this->envoi($subject);
					Flash::addSuccess(__('Mailing sent to all subscribers.'));
				}
				elseif(\Asgard\Core\App::get('post')->has('test')) {
					$this->test($subject);
					Flash::addSuccess(__('Mailing sent to the given email address.'));
				}
				else
					Flash::addSuccess($this->_messages['created']);
				
				if(\Asgard\Core\App::get('post')->has('send'))
					return \Asgard\Core\App::get('response')->redirect($this->url_for('index'));
				else
					return \Asgard\Core\App::get('response')->redirect($this->url_for('edit', array('id'=>$this->$_entity->id)));
			}
			catch(\Asgard\Form\FormException $e) {
				Flash::addError($e->errors);
			}
		
		$this->setRelativeView('form.php');
	}
	
	/**
	@Route(':id/edit')
	*/
	public function editAction($request) {
		$_entity = static::$_entity;
		
		if(!($this->$_entity = $_entity::load($request['id'])))
			$this->forward404();
	
		$this->form = $this->formConfigure($this->$_entity);
	
		if($this->form->isSent())
			try {
				$this->form->save();
				
				$subject = $this->form->title->getValue();
				if(\Asgard\Core\App::get('post')->has('tous')) {
					$this->envoi($subject);
					Flash::addSuccess(__('Mailing sent to all subscribers.'));
				}
				elseif(\Asgard\Core\App::get('post')->has('test')) {
					$this->test($subject);
					Flash::addSuccess(__('Mailing sent to the given email address.'));
				}
				else
					Flash::addSuccess($this->_messages['modified']);

				if(\Asgard\Core\App::get('post')->has('send'))
					return Response::redirect($this->url_for('index'));
			}
			catch(\Asgard\Core\Form\FormException $e) {
				Flash::addError($e->errors);
			}
		
		$this->setRelativeView('form.php');
	}
}