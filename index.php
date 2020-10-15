<?php
	session_start();

	require_once 'app/core/Core.php';

	$core = new Core;
	echo $core->start($_GET);