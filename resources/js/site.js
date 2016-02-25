$(window).on('load', function() {

	$.expr[":"].contains = $.expr.createPseudo(function(arg) {
		return function(elem) {
			return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
		};
	});

	$('[data-toggle="tooltip"]').tooltip();

	$('select').selectpicker();

	// $('#date').datepicker({
	// format : "yyyy-mm-dd",
	// language : "ru",
	// weekStart : 1,
	// autoclose : true
	// });

	$('#modal-edit-promo').on('show.bs.modal', function(e) {
		var elementId = $(e.relatedTarget).data('element-id');
		var elementName = $(e.relatedTarget).data('element-name');
		var elementText = $(e.relatedTarget).data('element-text');

		var pds = $('#promo-date-start-div');
		var pde = $('#promo-date-end-div');

		if (elementId) {
			pds.hide();
			pde.hide();
		} else {
			pds.show();
			pde.show();
		}

		$(e.currentTarget).find('input#id').val(elementId);
		$(e.currentTarget).find('input#promo-caption').val(elementName);
		$(e.currentTarget).find('textarea#promo-info').val(elementText);
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
