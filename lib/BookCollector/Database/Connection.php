<?php

	namespace BookCollector\Database;

	abstract class Connection {

		private static $conn;

		public static function getConn() {
			if (!self::$conn) {
				self::$conn = new \PDO('mysql: host=localhost; dbname=test', 'root', '');
			}
			var_dump(self::$conn);
			return self::$conn;
		}
	}