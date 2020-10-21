<?php

use app\view\pages\dashboard\DashboardView;
use \app\view\pages\addBook\AddBookView;

class DashboardController {

	public function dashboardPage() {
		
		$content['name_user'] = $_SESSION['usr']['name_user'];
		$content['books'] = $this->getUserBooks();
		$content['session_id'] = md5(session_id());

		$dashboardView = new DashboardView($content);
		return $dashboardView->renderWithContent('dashboard');
	}

	public function addBookPage() {
		$addBookView = new AddBookView([]);
		return $addBookView->render('addBook');
	}

	public function getUserBooks() {
		$book = new Book();
		$book->setFkAccountId($_SESSION['usr']['id_user']);
		return $book->getUserBooks();
	}

	public function addBook() {
		$book = new Book();
		$book->setTitle($_POST['title']);
		$book->setAuthor($_POST['author']);
		$book->setFkAccountId($_SESSION['usr']['id_user']);
		$book->createBook();
		header('Location: http://localhost/book-collector-php-oop/dashboard/dashboardPage');
	}

	public function logout($params) {
		
		$token = md5(session_id());

		if (isset($params[0]) && $params[0] === $token) {
			$_SESSION = array();
			session_destroy();
			header('Location: http://localhost/book-collector-php-oop/account/login');
			exit();
		} else {
			echo '<a href="http://localhost/book-collector-php-oop/dashboard/logout/">Confirmar Logout</a>';
		}
	}

}