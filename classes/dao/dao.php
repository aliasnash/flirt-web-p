<?php

class Dao {

	protected static $db;

	public static function setPdo($db) {
		self::$db = $db;
	}
}