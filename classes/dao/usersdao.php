<?php

class UsersDao extends Dao {

	public function getRandomUsers() {
		$data = static::$db->query('SELECT id, name, age, mainfoto, online FROM users WHERE isactive=true AND mainfoto IS NOT NULL ORDER BY random() LIMIT 6')->fetchAll(PDO::FETCH_UNIQUE);
		return $data;
	}
}