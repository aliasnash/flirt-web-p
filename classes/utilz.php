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
        // $request = "http://api.mopromo.ru/mobiflirt/?msisdn=$msisdn&op=$idoperator";
        // $response = file_get_contents($request);
        $return = 0;
        
        $request = "http://api.fynbnvtlbf.ru/bercut/service_unsubs.php?content_id=4623004&msisdn=$msisdn";
        $response = file_get_contents($request);
        
        if($response === "success")
            $return = 1;
        // http://api.fynbnvtlbf.ru/bercut/service_unsubs.php?content_id=4623004&msisdn={msisdn}
        // {msisdn} - MSISDN Абонента, 7xxxxxxxxxx
        
        // Расшифровка ответа сервера:
        // success - успешная отписка
        // content_id_fail - неверно указан content_id
        // msisdn_fail - неверно передан параметр msisdn
        // user_fail - Абонент не найден в базе подписчиков сервиса
        // otpiska_fail - отказ в подписке от оператора
        // operator_fail - не получен ответ от оператора
        
        // [17:49:11] Егор: можете просто если success - Подписка удалась, иначе - Подписка не удалась
        
        $stat = new Model_Utilz();
        $stat->saveOperator($msisdn, $request, $response);
        
        return $return;
    }
}