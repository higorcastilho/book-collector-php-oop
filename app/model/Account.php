<?php

use BookCollector\Database\Connection;

class Account {
	
	private $id;
	private $name;
	private $email;
	private $account_password;
	private $is_admin;

	public function createAccount() {
		try {
			$conn = Connection::getConn();
			var_dump($conn);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO accounts (name, email, account_password) VALUES (:name, :email, :account_password)";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array(':name' => $this->name, ':email' => $this->email, ':account_password' => $this->account_password));

		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getIsAdmin() {
		return $this->is_admin;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setAccountPassword($account_password) {
		$this->account_password = $account_password;
	}

	public function setIsAdmin($is_admin) {
		$this->is_admin = $is_admin;
	}	
}