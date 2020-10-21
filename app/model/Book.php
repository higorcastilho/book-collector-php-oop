<?php

use \BookCollector\Database\Connection;

class Book {

	private $id;
	private $title;
	private $author;
	private $fk_account_id;

	public function createBook() {
		try {
			$conn = Connection::getConn();
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO books (title, author, fk_account_id) VALUES (:title, :author, :fk_account_id)";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array(':title' => $this->title, ':author' => $this->author, ':fk_account_id' => $this->fk_account_id));
			
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function getUserBooks() {
		try {
			$conn = Connection::getConn();
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM books WHERE fk_account_id= :fk_account_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(':fk_account_id', $this->fk_account_id);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$result = $stmt->fetchAll();
				return $result;
			}

			throw new \Exception('No book found.');

		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		} 
	}

	public function getTitle() {
		return $this->title;
	}

	public function getAuthor() {
		return $this->author;
	} 

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setAuthor($author) {
		$this->author = $author;
	}

	public function setFkAccountId($fk_account_id) {
		$this->fk_account_id = $fk_account_id;
	}
}