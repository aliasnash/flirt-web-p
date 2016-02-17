<?php

class Utilz {

    public function unsubscribe($msisdn, $telco) {
        $res = file_get_contents("http://api.mopromo.ru/mobiflirt/?msisdn=$msisdn&op=$telco");
        return $res;
    }
}