<?php
namespace Coxis\Newsletter;

class Bundle extends \Coxis\Core\BundleLoader {
	public function run() {
		\Coxis\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => 'Newsletter', 'link' => 'newsletter');
		\Coxis\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Coxis\Core\Facades\Coxis\Core\App::get('url')->to('newsletter/icon.svg'), 'link'=>'newsletter', 'title' => __('Newsletter'), 'description' => __('Mange your newsletters.'));
		\Coxis\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => __('Subscribers'), 'link' => 'subscribers');
		\Coxis\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Coxis\Core\Facades\Coxis\Core\App::get('url')->to('newsletter/subscribers-icon.svg'), 'link'=>'subscribers', 'title' => __('Subscribers'), 'description' => __('Subscribers of your newsletter.'));
		parent::run();
	}
}