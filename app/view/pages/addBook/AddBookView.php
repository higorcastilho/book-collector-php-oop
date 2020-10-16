<?php

namespace app\view\pages\addBook;

class AddBookView {
	public function index() {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/addBook');
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load('addBook.html');

		return $template->render();
	}
}