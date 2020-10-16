<?php

use  app\view\pages\register\RegisterView;

class AccountController {

	public function registerPage() {
		$registerView = new RegisterView();
		return $registerView->index();
	}

	public function register() {
		try {
			$pass = $_POST['password'];
			$passConfirm = $_POST['passwordConfirm'];
			if ($pass != $passConfirm) {
				throw new \Exception("Passwords don't match. Please, try again.");
				header('Location: http://localhost/book-collector-php-oop/register-view/index');
			} 

			$account = new Account();
			$account->setName($_POST['name']);
			$account->setEmail($_POST['email']);
			$account->setAccountPassword($_POST['password']);
			$account->createAccount();

			header('Location: http://localhost/book-collector-php-oop/index.php');
		} catch (\Exception $e) {
			$_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
			header('Location: http://localhost/book-collector-php-oop/register-view-index');
		}
	}
}