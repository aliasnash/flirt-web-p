<?php

class UsersDao extends Dao {

	public function getUsersList($id) {
		$users = static::$db->query("SELECT id, msisdn, nickname, birthday, idcity FROM users WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);
		$data = array();
		
		if (count($users) > 0) {
			$user = $users[0];
			
			if (!empty($user['msisdn'])) {
				$stmt = static::$db->prepare("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '" . MIN_TIMEOUT_ONLINE . " minute' AS online 
                    FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id 
				    WHERE isactive=true AND u.id != :id AND p.photopath IS NOT NULL AND u.msisdn IS NOT NULL AND idcity = :idcity AND 
                    birthday BETWEEN date(:bd) - interval '" . SEARCH_YEAR_DIFF . " year' AND date(:bd) + interval '" . SEARCH_YEAR_DIFF . " year' 
				    ORDER BY online desc, likecount DESC, random() LIMIT " . REC_ON_PAGE);
				
				$stmt->execute(array('id' => $user['id'], 'idcity' => $user['idcity'], 'bd' => $user['birthday']));
			} else {
				$stmt = static::$db->prepare("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '" . MIN_TIMEOUT_ONLINE . " minute' AS online
                    FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id
				    WHERE isactive=true AND u.id != :id AND p.photopath IS NOT NULL AND u.msisdn IS NOT NULL
				    ORDER BY online desc, likecount DESC, random() LIMIT " . REC_ON_PAGE);
				
				$stmt->execute(array('id' => $id));
			}
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
	}

	public function getRandomUsers() {
		$data = static::$db->query("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '" . MIN_TIMEOUT_ONLINE . " minute' AS online 
                FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id 
                WHERE isactive=true AND p.photopath IS NOT NULL AND u.msisdn IS NOT NULL ORDER BY random() LIMIT " . REC_ON_PAGE)->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getUsersCountByFilter($id, $sex, $bage, $aage, $idcity) {
		if (!empty($id)) {
			$where = "";
			
			if (!empty($sex) && $sex > 0) $where .= " AND sex = $sex ";
			if (!empty($bage) && $bage > 0) $where .= " AND date_part('year', age(current_date, birthday)) >= $bage ";
			if (!empty($aage) && $aage > 0) $where .= " AND date_part('year', age(current_date, birthday)) <= $aage ";
			if (!empty($idcity) && $idcity > 0) $where .= " AND idcity = $idcity ";
			
			$stmt = static::$db->query("SELECT count(u.id)
                       FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id
 				       WHERE isactive=true AND u.id != $id AND p.photopath IS NOT NULL AND u.msisdn IS NOT NULL $where");
			$count = $stmt->fetchColumn();
			return $count;
		}
		return 0;
	}

	public function getUsersListByFilter($id, $sex, $bage, $aage, $idcity, $page) {
		if (!empty($id)) {
			$where = "";
			
			if (!empty($sex) && $sex > 0) $where .= " AND sex = $sex ";
			if (!empty($bage) && $bage > 0) $where .= " AND date_part('year', age(current_date, birthday)) >= $bage ";
			if (!empty($aage) && $aage > 0) $where .= " AND date_part('year', age(current_date, birthday)) <= $aage ";
			if (!empty($idcity) && $idcity > 0) $where .= " AND idcity = $idcity ";
			
			$offset = ($page - 1) * REC_ON_PAGE;
			$stmt = static::$db->query("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '10 minute' AS online
                                    FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id
                                    WHERE isactive=true AND u.id != $id AND p.photopath IS NOT NULL AND u.msisdn IS NOT NULL $where
                                    ORDER BY online desc, likecount DESC, u.id LIMIT " . REC_ON_PAGE . " OFFSET $offset");
			// $stmt->debugDumpParams();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getCityList() {
		$data = static::$db->query("SELECT id, caption FROM cities ORDER BY caption")->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function updateVisitUsersById($id) {
		static::$db->prepare("UPDATE users SET lastvisit = now() WHERE id = $id")->execute();
	}

	public function getUsersById($id) {
		if (!empty($id)) {
			$stmt = static::$db->prepare("SELECT id, nickname, msisdn, date_part('year', age(current_date, birthday)) as age, sex, sex_search, idcity FROM users WHERE isactive=true AND id = :id");
			$stmt->execute(array('id' => $id));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getPhotoList($id) {
		if (!empty($id)) {
			$stmt = static::$db->prepare("SELECT id, iduser, photopath FROM photos WHERE iduser = :iduser ORDER BY id");
			$stmt->execute(array('iduser' => $id));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getProfileById($id) {
		if (!empty($id)) {
			$stmt = static::$db->prepare("SELECT u.id, nickname, msisdn, sex, sex_search, birthday, 
                    date_part('day', birthday) as bday, 
                    date_part('month', birthday) as bmonth, 
                    date_part('year', birthday) as byear, idcity, description, isactive, c.caption, p.photopath, current_timestamp - lastvisit < interval '10 minute' AS online
                    FROM users u 
                    LEFT JOIN cities c ON u.idcity = c.id
                    LEFT JOIN photos p ON u.idmainphoto = p.id 
                    WHERE u.id = :id");
			$stmt->execute(array('id' => $id));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getUsersByMsisdn($msisdn) {
		if (!empty($msisdn)) {
			$stmt = static::$db->prepare("SELECT id, nickname, msisdn, date_part('year', age(current_date, birthday)) as age FROM users WHERE msisdn = :msisdn");
			$stmt->execute(array('msisdn' => $msisdn));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getUsersByClickId($clickid) {
		$stmt = static::$db->prepare("SELECT id, msisdn FROM users WHERE clickid = :clickid AND msisdn IS NULL");
		$stmt->execute(array('clickid' => $clickid));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function removeUserByClickId($click_id) {
		$stmt = static::$db->prepare("INSERT INTO users_removed
                (id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto, idoperator, clickid)
                (SELECT id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto, idoperator, clickid 
                FROM users WHERE clickid=:clickid)");
		$stmt->execute(array('clickid' => $click_id));
		$stmt = static::$db->prepare("DELETE FROM users WHERE clickid = :clickid");
		$stmt->execute(array('clickid' => $click_id));
	}
	
	public function removeUserByMsisdn($msisdn) {
	    $stmt = static::$db->prepare("INSERT INTO users_removed
                (id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto, idoperator, clickid)
                (SELECT id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto, idoperator, clickid
                FROM users WHERE msisdn=:msisdn)");
	    $stmt->execute(array('msisdn' => $msisdn));
	    $stmt = static::$db->prepare("DELETE FROM users WHERE msisdn = :msisdn");
	    $stmt->execute(array('msisdn' => $msisdn));
	}

	public function updateProfile($profile) {
		$params = array('id' => $profile['id'], 'nickname' => $profile['nickname'], 'sex' => $profile['sex'], 'birthday' => $profile['birthday'], 'idcity' => $profile['idcity'], 'description' => $profile['description']);
		$stmt = static::$db->prepare("UPDATE users SET nickname = :nickname, sex = :sex, birthday = date(:birthday), idcity = :idcity, description = :description WHERE id = :id");
		$stmt->execute($params);
	}

	public function generateProfile($clickid) {
		$params = array('clickid' => $clickid);
		$stmt = static::$db->prepare("INSERT INTO users(nickname, sex, isactive, lastvisit, clickid) VALUES('UNKNOWN', 0, true, now(), :clickid)");
		$stmt->execute($params);
	}

	public function activateProfile($clickid, $msisdn, $idoperator) {
		$params = array('clickid' => $clickid, 'msisdn' => $msisdn, 'idoperator' => $idoperator);
		$stmt = static::$db->prepare("UPDATE users SET msisdn = :msisdn, idoperator = :idoperator WHERE clickid = :clickid");
		// $stmt->debugDumpParams();
		$stmt->execute($params);
	}

	public function updateMainPhoto($idu, $idphoto) {
		$params = array('idphoto' => $idphoto, 'idu' => $idu);
		$stmt = static::$db->prepare("UPDATE users SET idmainphoto = :idphoto WHERE id = :idu");
		$stmt->execute($params);
	}

	public function removePhoto($idu, $idphoto) {
		$params = array('idphoto' => $idphoto, 'idu' => $idu);
		$stmt = static::$db->prepare("DELETE FROM photos WHERE id = :idphoto AND iduser = :idu");
		$stmt->execute($params);
	}

	public function getMessages($id, $iduser) {
		if (!empty($id) && !empty($iduser)) {
			$stmt = static::$db->prepare("SELECT m.id, to_char(m.dateadded, 'YYYY-mm-DD HH24:MI:SS') AS dateadded, m.message, us.id AS idus, ud.id AS idud, ps.photopath AS pspath, pd.photopath AS pdpath, 
                    CASE WHEN us.id = :id THEN true ELSE false END AS msgowner  
                    FROM messages m
                    LEFT JOIN users us ON m.idusersrc = us.id
                    LEFT JOIN photos ps ON us.idmainphoto = ps.id
                    LEFT JOIN users ud ON m.iduserdst = ud.id
                    LEFT JOIN photos pd ON ud.idmainphoto = pd.id
                    WHERE us.id IN (:id, :iduser) AND ud.id IN (:id, :iduser) ORDER BY m.id");
			
			$stmt->execute(array('id' => $id, 'iduser' => $iduser));
			
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getMessagesById($id, $iduser, $idmessage) {
		if (!empty($id) && !empty($iduser)) {
			$params = array('id' => $id, 'iduser' => $iduser);
			$stmt = static::$db->prepare("UPDATE messages SET isreaded = true WHERE idusersrc = :iduser AND iduserdst = :id AND isreaded = false");
			$stmt->execute($params);
			
			$stmt = static::$db->prepare("SELECT m.id, to_char(m.dateadded, 'YYYY-mm-DD HH24:MI:SS') AS dateadded, m.message, us.id AS idus, ud.id AS idud, ps.photopath AS pspath, pd.photopath AS pdpath, 
                    CASE WHEN us.id = :id THEN true ELSE false END AS msgowner
                    FROM messages m
                    LEFT JOIN users us ON m.idusersrc = us.id
                    LEFT JOIN photos ps ON us.idmainphoto = ps.id
                    LEFT JOIN users ud ON m.iduserdst = ud.id
                    LEFT JOIN photos pd ON ud.idmainphoto = pd.id
                    WHERE us.id IN (:id, :iduser) AND ud.id IN (:id, :iduser) AND m.id > :idmessage ORDER BY m.id");
			
			$stmt->execute(array('id' => $id, 'iduser' => $iduser, 'idmessage' => $idmessage));
			
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function updateMessageAsReaded($id, $iduser) {
		$params = array('id' => $id, 'iduser' => $iduser);
		$stmt = static::$db->prepare("UPDATE messages SET isreaded = true WHERE idusersrc = :iduser AND iduserdst = :id AND isreaded = false");
		$stmt->execute($params);
	}

	public function createMessage($id, $iduser, $msg) {
		$params = array('id' => $id, 'iduser' => $iduser, 'msg' => $msg);
		$stmt = static::$db->prepare("INSERT INTO messages(idusersrc, iduserdst, message, isreaded) VALUES(:id, :iduser, :msg, false)");
		$stmt->execute($params);
	}

	public function getCountUnreadedMessages($id) {
		if (!empty($id)) {
			$stmt = static::$db->query("SELECT count(id) FROM messages WHERE iduserdst = $id AND isreaded = false");
			$count = $stmt->fetchColumn();
			return $count;
		}
		return 0;
	}

	public function getMessagesAllUnreaded($id) {
		if (!empty($id)) {
			$stmt = static::$db->prepare("SELECT us.id AS idus, nickname, date_part('year', age(current_date, birthday)) AS age, 
					current_timestamp - lastvisit < interval '10 minute' AS online, ps.photopath AS pspath
					FROM messages m
					LEFT JOIN users us ON m.idusersrc = us.id
					LEFT JOIN photos ps ON us.idmainphoto = ps.id
					WHERE m.id IN (SELECT max(id) FROM messages WHERE iduserdst = :id AND isreaded = false GROUP BY idusersrc)
					ORDER BY m.id DESC");
			
			$stmt->execute(array('id' => $id));
			
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function getMessagesAll($id) {
		if (!empty($id)) {
			$stmt = static::$db->prepare("SELECT boo.idchatuser AS idus, nickname, date_part('year', age(current_date, birthday)) AS age, current_timestamp - lastvisit < interval '10 minute' AS online, ps.photopath AS pspath 
                    FROM (
                        SELECT max(dateadded) AS dd, idchatuser 
                        FROM (
                            SELECT dateadded, CASE WHEN iduserdst = :id THEN idusersrc ELSE iduserdst END AS idchatuser
                            FROM messages WHERE (iduserdst = :id OR idusersrc = :id)
                        ) foo
                        GROUP BY idchatuser
                    ) boo
                    LEFT JOIN users us ON boo.idchatuser = us.id
                    LEFT JOIN photos ps ON us.idmainphoto = ps.id
                    WHERE us.id IS NOT NULL
                    ORDER BY dd DESC");
			
			$stmt->execute(array('id' => $id));
			
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		return array();
	}

	public function uploadPhoto($iduser, $photopath) {
		$params = array('iduser' => $iduser, 'photopath' => $photopath);
		$stmt = static::$db->prepare("INSERT INTO photos(iduser, photopath) VALUES(:iduser, :photopath)");
		$stmt->execute($params);
	}

	public function payHistory($channelid, $clickid, $pay, $op, $msisdn) {
		$params = array('msisdn' => $msisdn, 'idoperator' => $op, 'summa' => $pay, 'channelid' => $channelid, 'clickid' => $clickid);
		$stmt = static::$db->prepare("INSERT INTO payment_history(msisdn, idoperator, summa, channelid, clickid) VALUES (:msisdn, :idoperator, :summa, :channelid, :clickid)");
		$stmt->execute($params);
	}

	public function saveStat($iduser, $page) {
		$params = array('iduser' => $iduser, 'page' => $page);
		$stmt = static::$db->prepare("INSERT INTO user_actions(iduser, page) VALUES(:iduser, :page)");
		$stmt->execute($params);
	}

	public function saveOperator($msisdn, $request, $response) {
		$params = array('msisdn' => $msisdn, 'request' => $request, 'response' => $response);
		$stmt = static::$db->prepare("INSERT INTO operator_stat(msisdn, request, response) VALUES(:msisdn, :request, :response)");
		$stmt->execute($params);
	}
}