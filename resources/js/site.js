$(window).on('load', function() {

	$.expr[":"].contains = $.expr.createPseudo(function(arg) {
		return function(elem) {
			return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
		};
	});

	$('[data-toggle="tooltip"]').tooltip();

	$('select').selectpicker();

	// img-avatar
	// profile-photo-buttons-holder
	// set-main
	// remove-img

	$('#modal-set-main').on('show.bs.modal', function(e) {
		var elementId = $(e.relatedTarget).data('element-id');
		var elementPhoto = $(e.relatedTarget).data('element-photo');

		$(e.currentTarget).find('input#sid').val(elementId);
		$(e.currentTarget).find('input#sphoto').val(elementPhoto);
	});

	$('#set-main').on('click', function(event) {
		var id = $('input#sid').val();
		var photo = $('input#sphoto').val();

		$.post(contexPath + "/utilz/setphoto", {
			idphoto : id,
		}).success(function(data) {
			$('#img-avatar').attr('src', photo);
		}).error(function(data) {
			console.log("Ошибка выполнения " + data);
		}).complete(function(data) {

		});
	});

	$('#modal-remove-img').on('show.bs.modal', function(e) {
		var elementId = $(e.relatedTarget).data('element-id');
		var elementPhoto = $(e.relatedTarget).data('element-photo');

		$(e.currentTarget).find('input#rid').val(elementId);
		$(e.currentTarget).find('input#rphoto').val(elementPhoto);
	});

	$('#remove-img').on('click', function(event) {
		var id = $('input#rid').val();
		var photo = $('input#rphoto').val();

		$.post(contexPath + "/utilz/removephoto", {
			idphoto : id,
		}).success(function(data) {
			$('#block_photo_' + id).remove();
		}).error(function(data) {
			console.log("Ошибка выполнения " + data);
		}).complete(function(data) {

		});
	});

	$('#profile-gallery-button').on('click', function(event) {
		event.preventDefault();
		$('#blueimp-gallery').data('fullScreen', true);
		blueimp.Gallery($('#links a'), $('#blueimp-gallery').data());
	});

	function finishSelection(selection) {
		$('input[name="x1"]').val(selection.x);
		$('input[name="y1"]').val(selection.y);
		$('input[name="x2"]').val(selection.x2);
		$('input[name="y2"]').val(selection.y2);
		$('input[name="w"]').val(selection.w);
		$('input[name="h"]').val(selection.h);
	}

	jQuery(function($) {
		$('.foo img').Jcrop({
			onSelect : finishSelection,
			onChange : finishSelection,
			allowResize : false,
			allowSelect : false,
			setSelect : [ 0, 0, 200, 200 ],
			bgColor : 'black',
			bgOpacity : .4
		});
	});

	$("#add-photo").fileinput({
		overwriteInitial : true,
		// allowedFileTypes : [ "image" ],
		allowedFileExtensions : [ 'jpg', 'jpeg', 'png' ],
		showClose : false,
		showCaption : false,
		browseLabel : '',
		removeLabel : '',
		uploadLabel : '',
		browseIcon : '<i class="glyphicon glyphicon-folder-open"></i>',
		removeIcon : '<i class="glyphicon glyphicon-remove"></i>',
		elErrorContainer : '#add-photo-errors',
		msgErrorClass : 'alert alert-block alert-danger',
		defaultPreviewContent : '<img src="' + contexPath + '/resources/images/default_avatar.jpg">',

		layoutTemplates : {
			main2 : '{preview} {browse} {remove} {upload}'
		}
	});

});
