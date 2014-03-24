<?php
/**
@Prefix('newsletter')
*/
class SubscriberController extends \Asgard\Core\Controller {
	public function newsletter() {
		$subscriber = new Subscriber;
		$this->form = new EntityForm($subscriber);
	}

	/**
	@Route('submit')
	*/
	public function submitAction($request) {
		$subscriber = new Subscriber;
		$this->form = new EntityForm($subscriber);
		if($this->form->isSent()) {
			try {
				$this->form->save();
			}
			catch(\Asgard\Form\FormException $e) {
				echo 'Mail incorrect !';
				return \Asgard\Core\App::get('response')->setCode(500);
			}
		}
	}
	/**
	@Route('unsubscribe/:key')
	*/
	public function unsubAction($request) {
		$subscriber = Membre::where(array("SHA1(CONCAT('".Config::get('salt')."', id)) = '$request[key]'"))->first();
		if(!$membre)
			$this->notfound();
		$subscriber->destroy();
		return '<p>'.__('You have been unsubscribed.').'</p>';
	}
}