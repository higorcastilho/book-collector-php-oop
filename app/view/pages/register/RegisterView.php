<?php

namespace app\view\pages\register;

class RegisterView {
	public function index() {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/register');
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load('register.html');

		return $template->render();
	}
}