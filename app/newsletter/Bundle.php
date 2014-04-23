<?php
namespace Asgard\Newsletter;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run() {
		\App\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => 'Newsletter', 'link' => 'newsletter');
		\App\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Asgard\Core\App::get('url')->to('newsletter/icon.svg'), 'link'=>'newsletter', 'title' => __('Newsletter'), 'description' => __('Mange your newsletters.'));
		\App\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => __('Subscribers'), 'link' => 'subscribers');
		\App\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Asgard\Core\App::get('url')->to('newsletter/subscribers-icon.svg'), 'link'=>'subscribers', 'title' => __('Subscribers'), 'description' => __('Subscribers of your newsletter.'));
		parent::run();
	}
}