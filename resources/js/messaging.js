$(window).on('load', function() {

	var response = true;
	var responseNew = true;

	scrollToDown();
	setInterval(newMessage, 1000 * 5);

	$('.media .close').click(function(event) {
		$(this).parents("li").remove();
	});

	$('#form-send-msg #send-message').click(function(event) {
		var iduser = $('#form-send-msg #s').val();
		var message = $('#form-send-msg #msg').val();

		if (iduser > 0 && message) {
			if (responseNew == true) {
				responseNew = false;
				$.post(contexPath + "/utilz/addmsg", {
					iduser : iduser,
					message : message
				}).success(function(data) {
					$('#form-send-msg #msg').val('');
					newMessage();
				}).error(function(data) {
					console.log("Ошибка выполнения " + data);
				}).complete(function(data) {
					responseNew = true;
				});
			}
		}
	});

	$('#form-send-msg #msg').on('keydown', function(e) {
		if (e.which == 13) {
			$('#form-send-msg #send-message').trigger('click');
			return false;
		}
	});

	function scrollToDown() {
		$('#box').animate({
			scrollTop : $('#box')[0].scrollHeight
		});
	}

	function newMessage() {
		var elementToAdd = $('ul:last');
		var idmessage = $('li:last').data('element-id');
		if (!idmessage || idmessage == 'undefined') idmessage = 0;

		var iduser = $('#form-send-msg #s').val();
		if (iduser > 0) {
			if (response == true) {
				response = false;
				$.post(contexPath + "/utilz/newmsg", {
					iduser : iduser,
					idmessage : idmessage
				}).success(function(data) {
					// console.log("Успешное выполнение " + data);
					var parsedData = jQuery.parseJSON(data);
					if ($.isEmptyObject(parsedData)) {
						// console.log('emtpy');
					} else {
						for ( var i in parsedData) {
							var d = parsedData[i];
							addMessage(d, elementToAdd);
						}
						scrollToDown();
					}
				}).error(function(data) {
					console.log("Ошибка выполнения " + data);
				}).complete(function(data) {
					response = true;
				});
			}
		}
	}

	function addMessage(message, element) {
		var html = '<li class="media" data-element-id="' + message.id + '">';

		if (message.msgowner) {
			html = html + '<div class="media-body bg-info">';
			html = html + '<div class="media">';
			html = html + '<p class="pull-right" style="margin-bottom: 0px;">';
			html = html + '<img class="media-object img-circle" style="width: 60px;" src="' + contexPath + '/images/' + message.pspath + '"/>';
			html = html + '</p>';
			html = html + '<div class="media-body text-right">';
		} else {
			html = html + '<div class="media-body bg-warning">';
			html = html + '<div class="media">';
			html = html + '<a class="pull-left" href="' + contexPath + '/users/profile?id=' + message.idus + '">';
			html = html + '<img class="media-object img-circle " style="width: 60px;" src="' + contexPath + '/images/' + message.pspath + '" />';
			html = html + '</a>';
			html = html + '<div class="media-body text-left">';
		}

		html = html + message.message + '<br /> <small class="text-muted">' + message.dateadded + '</small>';
		html = html + '</div>';
		html = html + '</div>';
		html = html + '</div>';
		html = html + '</li>';

		element.append(html);
		// $(html).insertAfter(element);
	}
});
