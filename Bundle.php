<?php
namespace Asgard\Newsletter;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run() {
		\Asgard\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => 'Newsletter', 'link' => 'newsletter');
		\Asgard\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Asgard\Core\Facades\Asgard\Core\App::get('url')->to('newsletter/icon.svg'), 'link'=>'newsletter', 'title' => __('Newsletter'), 'description' => __('Mange your newsletters.'));
		\Asgard\Admin\Libs\AdminMenu::instance()->menu[0]['childs'][] = array('label' => __('Subscribers'), 'link' => 'subscribers');
		\Asgard\Admin\Libs\AdminMenu::instance()->home[] = array('img'=>\Asgard\Core\Facades\Asgard\Core\App::get('url')->to('newsletter/subscribers-icon.svg'), 'link'=>'subscribers', 'title' => __('Subscribers'), 'description' => __('Subscribers of your newsletter.'));
		parent::run();
	}
}