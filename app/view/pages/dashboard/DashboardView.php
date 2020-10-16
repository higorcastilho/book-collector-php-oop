<?php

namespace app\view\pages\dashboard;

class DashboardView {

	private $content;

	function __construct($content) {
		$this->content = $content;
	}

	public function index() {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/dashboard');
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load('dashboard.html');

		return $template->render($this->getContent());
	}

	public function getContent() {
		return $this->content;
	}

}