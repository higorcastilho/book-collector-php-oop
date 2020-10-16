<?php

namespace app\view\pages\login;

class LoginView {
	public function index() {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/login');
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load('login.html');

		return $template->render();
	}
}