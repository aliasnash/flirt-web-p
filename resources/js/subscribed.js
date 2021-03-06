$(window).on('load', function() {

	var responseCnt = true;
	var responseVisit = true;

	msgCount();
	visit();

	if (reqTimeoutMsgCount != 0 && reqTimeoutMsgCount && reqTimeoutMsgCount != 'undefined') setInterval(msgCount, reqTimeoutMsgCount);
	if (reqTimeoutUpdateVisit != 0 && reqTimeoutUpdateVisit && reqTimeoutUpdateVisit != 'undefined') setInterval(visit, reqTimeoutUpdateVisit);

	setInterval(msgCount, 1000 * 12);
	setInterval(visit, 1000 * 91);

	function msgCount() {
		if (responseCnt == true) {
			responseCnt = false;

			$.post(contexPath + "/utilz/msgcnt").success(function(data) {
				// console.log("Успешное выполнение " + data);
				if (data == 0) data = '';
				$('#badge-unreaded-messages').html(data);
			}).error(function(data) {
				// console.log("Ошибка выполнения " + data);
			}).complete(function(data) {
				// console.log("Завершение выполнения ");
				responseCnt = true;
			});
		}
	}

	function visit() {
		if (responseVisit == true) {
			responseVisit = false;

			$.post(contexPath + "/utilz/visit").success(function(data) {
				// console.log("Успешное выполнение " + data);
			}).error(function(data) {
				// console.log("Ошибка выполнения " + data);
			}).complete(function(data) {
				// console.log("Завершение выполнения ");
				responseVisit = true;
			});
		}
	}

	$('li.media').click(function(event) {
		var iduser = $(this).data('element-id');
		$('#form-goto-chat #s').val(iduser);
		$('#form-goto-chat form').submit();
	});
});
