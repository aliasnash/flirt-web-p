<?php

class UsersDao extends Dao {

	public function getUsersList($id) {
		$users = static::$db->query("SELECT id, name, age, mainfoto, online, city, search_sex FROM users WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);
		$data = array();
		
		if (count($users) > 0) {
			$user = $users[0];
			
			$stmt = static::$db->prepare("SELECT id, name, age, mainfoto, online FROM users 
				WHERE isactive=true AND id != :id AND sex = :search_sex AND age BETWEEN :age-5 AND age+5 AND city = :city 
				ORDER BY online desc, likes DESC, random() limit 6");
			$stmt->execute(array('id' => $user['id'], 'search_sex' => $user['search_sex'], 'age' => $user['age'], 'city' => $user['city']));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
	}

	public function getRandomUsers() {
		$data = static::$db->query('SELECT id, name, age, mainfoto, online FROM users WHERE isactive=true AND mainfoto IS NOT NULL ORDER BY random() LIMIT 6')->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getUsersByMsisdn($msisdn) {
		if (!empty($msisdn)) {
			$stmt = static::$db->prepare("SELECT id, name, msisdn, age FROM users WHERE isactive=true AND msisdn = :msisdn");
			$stmt->execute(array('msisdn' => $msisdn));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}
}