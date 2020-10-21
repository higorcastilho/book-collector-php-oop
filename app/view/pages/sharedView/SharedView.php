<?php 

namespace app\view\pages\sharedView;

abstract class SharedView {

	private $content;

	public function __construct($content) {
		$this->content = $content;
	} 

	public function render($page) {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/' . $page);
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load($page . '.html');

		return $template->render();
	}

	public function renderWithContent($page) {
		$loader = new \Twig\Loader\FilesystemLoader('app/view/pages/'. $page);
		$twig = new \Twig\Environment($loader, [
		    'auto_reload' => true,
		]);

		$template = $twig->load($page . '.html');

		return $template->render($this->getContent());
	}

	private function getContent() {
		return $this->content;
	}
}	