$(window).on('load', function() {

	$.expr[":"].contains = $.expr.createPseudo(function(arg) {
		return function(elem) {
			return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
		};
	});

	$('[data-toggle="tooltip"]').tooltip();

//	$('select').selectpicker();

//	$('#date').datepicker({
//		format : "yyyy-mm-dd",
//		language : "ru",
//		weekStart : 1,
//		autoclose : true
//	});

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
});
