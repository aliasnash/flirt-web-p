<?php

class Utilz {
    // 1 – Билайн, 2 – МТС, 3 – Мегафон, 4 – Теле2
    
    private $operators = array(1 => "beeline", 2 => "mts", 3 => "megafon", 4 => "tele2");

    public function parseIdOperator($idoperator) {
        $oper = $this->operators[$idoperator];
        return isset($oper) ? $oper : '';
    }

    public function unsubscribe($msisdn, $idoperator) {
        // В случае успешной отписки Платформа возвращает текст «1», в случае ошибки отписки - текст «0».
        $request = "http://api.mopromo.ru/mobiflirt/?msisdn=$msisdn&op=$idoperator";
        $response = file_get_contents($request);
        
        $stat = new Model_Utilz();
        $stat->saveOperator($msisdn, $request, $response);
        
        return $response;
    }
}