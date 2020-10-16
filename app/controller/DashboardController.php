<?php

use app\view\pages\dashboard\DashboardView;
use \app\view\pages\addBook\AddBookView;

class DashboardController {

	public function dashboardPage() {
		
		$content['name_user'] = $_SESSION['usr']['name_user'];
		$content['books'] = array(); //get after
		$dashboardView = new DashboardView($content);
		return $dashboardView->index();
	}

	public function addBookPage() {
		$addBookView = new AddBookView();
		return $addBookView->index();
	}
}