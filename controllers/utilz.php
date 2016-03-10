<?php

class Controller_Utilz extends Controller_Base {

	protected $layouts = "empty_layouts";

	function index() {}

	function setphoto() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$idphoto = intval(isset($_POST['idphoto']) ? $_POST['idphoto'] : 0);
		
		if ($idu > 0 && $idphoto > 0) {
			$model = new Model_Profile();
			$model->updateMainPhoto($idu, $idphoto);
			$this->stat->saveStat($idu, "utilz/setphoto");
		}
	}

	function removephoto() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$idphoto = intval(isset($_POST['idphoto']) ? $_POST['idphoto'] : 0);
		
		if ($idu > 0 && $idphoto > 0) {
			$model = new Model_Profile();
			$model->removePhoto($idu, $idphoto);
			$this->stat->saveStat($idu, "utilz/removephoto");
		}
	}

	function msgcnt() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$count = 0;
		
		if ($idu > 0) {
			$model = new Model_Message();
			$count = $model->getCountUnreadedMessages($idu);
		}
		
		$this->template->vars('count', $count);
		$this->template->view('msgcnt');
	}

	function visit() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			$model = new Model_Profile();
			$model->updateLastVisit($idu);
		}
	}

	function newmsg() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$iduser = intval(isset($_POST['iduser']) ? $_POST['iduser'] : 0);
		$idmessage = intval(isset($_POST['idmessage']) ? $_POST['idmessage'] : 0);
		
		if ($idu > 0 && $iduser > 0) {
			$model = new Model_Message();
			$data = $model->getMessagesById($idu, $iduser, $idmessage);
			$this->template->vars('data', json_encode($data));
			$this->template->view('newmsg');
		}
	}

	function addmsg() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$iduser = isset($_POST['iduser']) ? $_POST['iduser'] : 0;
		$message = isset($_POST['message']) ? $_POST['message'] : 0;
		
		if ($idu > 0 && $iduser > 0 && !empty($message)) {
			$model = new Model_Message();
			$model->createMessage($idu, $iduser, $message);
		}
	}

	function on() {
		// http://mobi-flirt.ru/flirt/utilz/on?status=new&channel_id={channel_id}&click_id={click_id}&op={operator_id}&msisdn={msisdn}
		
		// http://{partner_url}?status=new&channel_id={channel_id}&click_id={click_id}&op={operator_id}&msisdn={msisdn}
		
		// {click_id} – значение get-параметра click_id, полученное от партнера при переходе пользователя;
		// {channel_id} – id канала в системе MoPromo;
		// {operator_id} – id оператора (1 – Билайн, 2 – МТС, 3 – Мегафон, 4 – Теле2);
		// {msisdn} – MSISDN (номер телефона Абонента) для последующей авторизации на Сервисе
		
		$status = isset($_GET['status']) ? $_GET['status'] : '';
		$channelid = intval(isset($_GET['channel_id']) ? $_GET['channel_id'] : 0);
		$clickid = intval(isset($_GET['click_id']) ? $_GET['click_id'] : 0);
		$op = intval(isset($_GET['op']) ? $_GET['op'] : 0);
		$msisdn = isset($_GET['msisdn']) ? $_GET['msisdn'] : '';
		
		$response = '0';
		
		if (!empty($msisdn) && intval($msisdn) > 0 && $op > 0 && $clickid > 0) {
			$model = new Model_Profile();
			$model->activateProfile($clickid, $msisdn, $op);
			
			$response = '1';
		}
		
		$this->stat->saveOperator($msisdn, $_SERVER["REQUEST_URI"], $response);
		echo $response;
	}

	function off() {
		// http://mobi-flirt.ru/flirt/utilz/off?status=quit&channel_id={channel_id}&click_id={click_id}&op={operator_id}&msisdn={msisdn}
		
		// http://{partner_url}?status=quit&channel_id={channel_id}&click_id={click_id}&op={operator_id}&msisdn={msisdn}
		
		// {click_id} – значение get-параметра click_id, полученное от партнера при переходе пользователя;
		// {channel_id} – id канала в системе MoPromo;
		// {operator_id} – id оператора (1 – Билайн, 2 – МТС, 3 – Мегафон, 4 – Теле2);
		// {msisdn} – MSISDN (номер телефона Абонента).
		
		$status = isset($_GET['status']) ? $_GET['status'] : '';
		$channelid = intval(isset($_GET['channel_id']) ? $_GET['channel_id'] : 0);
		$clickid = intval(isset($_GET['click_id']) ? $_GET['click_id'] : 0);
		$op = intval(isset($_GET['op']) ? $_GET['op'] : 0);
		$msisdn = isset($_GET['msisdn']) ? $_GET['msisdn'] : '';
		
		$response = '0';
		
		if (!empty($msisdn) && intval($msisdn) > 0 && $op > 0 && $clickid > 0) {
			$model = new Model_Profile();
			$model->removeProfile($msisdn);
			
			$response = '1';
		}
		
		$this->stat->saveOperator($msisdn, $_SERVER["REQUEST_URI"], $response);
		echo $response;
	}

	function charge() {
		// http://mobi-flirt.ru/flirt/utilz/charge?status=pay&channel_id={channel_id}&click_id={click_id}&pay={sum_payed}&op={operator_id}&msisdn={msisdn}
		
		// http://{partner_url}?status=pay&channel_id={channel_id}&click_id={click_id}&pay={sum_payed}&op={operator_id}&msisdn={msisdn}
		
		// {click_id} – значение get-параметра click_id, полученное от партнера при переходе пользователя;
		// {sum_payed} – сумма списания с абонента, в рублях с НДС (0 – неуспешное списание);
		// {channel_id} – id канала в системе MoPromo;
		// {operator_id} – id оператора (1 – Билайн, 2 – МТС, 3 – Мегафон, 4 – Теле2);
		// {msisdn} – MSISDN (номер телефона Абонента).
		
		$status = isset($_GET['status']) ? $_GET['status'] : '';
		$channelid = intval(isset($_GET['channel_id']) ? $_GET['channel_id'] : 0);
		$clickid = intval(isset($_GET['click_id']) ? $_GET['click_id'] : 0);
		$pay = floatval(isset($_GET['pay']) ? $_GET['pay'] : 0);
		$op = intval(isset($_GET['op']) ? $_GET['op'] : 0);
		$msisdn = isset($_GET['msisdn']) ? $_GET['msisdn'] : '';
		
		if (!empty($msisdn) && intval($msisdn) > 0 && $op > 0 && $clickid > 0) {
			$model = new Model_Payment();
			$model->payHistory($channelid, $clickid, $pay, $op, $msisdn);
			
			echo '1';
		} else {
			echo '0';
		}
	}

}