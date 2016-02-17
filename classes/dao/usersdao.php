<?php

class UsersDao extends Dao {

    public function getUsersList($id) {
        $users = static::$db->query("SELECT id, nickname, birthday, idcity, sex_search FROM users WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);
        $data = array();
        
        if (count($users) > 0) {
            $user = $users[0];
            
            $stmt = static::$db->prepare("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '20 minute' AS online 
                    FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id 
				    WHERE isactive=true AND u.id != :id AND p.photopath IS NOT NULL AND sex = :sex_search AND idcity = :idcity AND 
                    birthday BETWEEN date(:bd) - interval '5 year' AND date(:bd) + interval '5 year' 
				    ORDER BY online desc, likecount DESC, random() limit 6");
            
            $stmt->execute(array('id' => $user['id'], 'sex_search' => $user['sex_search'], 'idcity' => $user['idcity'], 'bd' => $user['birthday']));
            // $stmt->debugDumpParams();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getRandomUsers() {
        $data = static::$db->query("SELECT u.id, nickname, date_part('year', age(current_date, birthday)) as age, p.photopath, current_timestamp - lastvisit < interval '20 minute' AS online 
                FROM users u LEFT JOIN photos p ON u.idmainphoto = p.id 
                WHERE isactive=true AND p.photopath IS NOT NULL ORDER BY random() LIMIT 6")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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

    public function getProfileById($id) {
        if (!empty($id)) {
            $stmt = static::$db->prepare("SELECT id, nickname, msisdn, sex, sex_search, birthday, 
                    date_part('day', birthday) as bday, 
                    date_part('month', birthday) as bmonth, 
                    date_part('year', birthday) as byear, idcity, description, isactive 
                    FROM users WHERE id = :id");
            $stmt->execute(array('id' => $id));
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        return array();
    }
    
    public function getProfileWithCityById($id) {
        if (!empty($id)) {
            $stmt = static::$db->prepare("SELECT u.id, nickname, msisdn, sex, sex_search, birthday,
                    date_part('day', birthday) as bday,
                    date_part('month', birthday) as bmonth,
                    date_part('year', birthday) as byear, idcity, description, isactive, c.caption
                    FROM users u LEFT JOIN cities c ON u.idcity = c.id 
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

    public function removeUserByMsisdn($msisdn) {
        $stmt = static::$db->prepare("INSERT INTO users_removed
                (id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto)
                (SELECT id, msisdn, dateadded, nickname, sex, sex_search, birthday, idcity, description, isactive, lastvisit, likecount, idmainphoto 
                FROM users WHERE msisdn='$msisdn')");
        $stmt->execute();
        
        $stmt = static::$db->prepare("DELETE FROM users WHERE msisdn = '$msisdn'");
        $stmt->execute();
    }

    public function updateProfile($profile) {
        $params = array('id' => $profile['id'], 'nickname' => $profile['nickname'], 'sex' => $profile['sex'], 'birthday' => $profile['birthday'], 'idcity' => $profile['idcity'], 'description' => $profile['description']);
        
        $stmt = static::$db->prepare("UPDATE users SET nickname = :nickname, sex = :sex, birthday = date(:birthday), idcity = :idcity, description = :description WHERE id = :id");
        // $stmt->debugDumpParams();
        $stmt->execute($params);
    }

}