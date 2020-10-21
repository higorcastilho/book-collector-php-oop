<?php

use  app\view\pages\register\RegisterView;
use  app\view\pages\login\LoginView;

class AccountController {

	public function loginPage() {

		$content['msg_error'] = $_SESSION['msg_error'] ?? null;
		$loginView = new LoginView($content);
		return $loginView->renderWithContent('login');
	}

	public function registerPage() {
		$content['msg_error'] = $_SESSION['msg_error'] ?? null;
		$registerView = new RegisterView($content);
		return $registerView->renderWithContent('register');
	}

	public function login() {
		try {
			$account = new Account();
			$account->setEmail($_POST['email']);
			$account->setAccountPassword($_POST['password']);
			$result = $account->login();

			if ($result['account_password'] === $account->getAccountPassword()) {
				$_SESSION['usr'] = array('id_user' => $result['id'], 'name_user' => $result['name']);
					
				header('Location: http://localhost/book-collector-php-oop/dashboard/dashboardPage');
				return true;
			}

			throw new \Exception('Invalid Login.');

		} catch(\Exception $e) {
			$_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
			header('Location: http://localhost/book-collector-php-oop/account/loginPage');
		}
	}

	public function register() {
		try {
			$pass = $_POST['password'];
			$passConfirm = $_POST['passwordConfirm'];
			if ($pass != $passConfirm) {
				throw new \Exception("Passwords don't match. Please, try again.");
			} 

			$account = new Account();
			$account->setName($_POST['name']);
			$account->setEmail($_POST['email']);
			$account->setAccountPassword($_POST['password']);
			$account->createAccount();

			header('Location: http://localhost/book-collector-php-oop/index.php');
		} catch (\Exception $e) {
			$_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
			header('Location: http://localhost/book-collector-php-oop/account/registerPage');
		}
	}
}