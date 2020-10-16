<?php
	session_start();

	require_once 'app/core/Core.php';

	require_once 'lib/BookCollector/Database/Connection.php';

	require_once 'app/controller/LoginController.php';
	require_once 'app/controller/AccountController.php';
	require_once 'app/controller/DashboardController.php';

	require_once 'app/view/pages/register/RegisterView.php';
	require_once 'app/view/pages/login/LoginView.php';
	require_once 'app/view/pages/dashboard/DashboardView.php';
	require_once 'app/view/pages/addBook/AddBookView.php';

	require_once 'app/model/Account.php';

	require_once 'vendor/autoload.php';
	
	$core = new Core;
	echo $core->start($_GET);