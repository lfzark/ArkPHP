(function($) {

	$.fn.modal_j = function(options) {

		var defaults = {
			modalClass : '.modal',
			modal_content : 'Hello I\'m Mr.Modal J',
			modal_title : 'model_j',
			modal_size : '',
			modal_footer : ''
		};

		var settings = $.extend({}, defaults, options);

		this.addClass('modal fade');
		this.attr('tabindex', '-1');
		this.attr('role', 'dialog');

		var content = '  <div class="modal-dialog" role="document"> '
				+ '<div class="modal-content"> '
				+ '<div class="modal-header">'
				+ '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> '
				+ '<h4 class="modal-title" >Modal title</h4> ' + '</div>'
				+ '<div class="modal-body">' + settings['modal_content']
				+ '</div>' + '<div class="modal-footer">'
				+ settings['modal_footer'] + '</div>' + '</div>' + '</div>';

		this.html(content);
		$(this).find('.modal-dialog').addClass(settings['modal_size']);
		$(this).find('.modal-title').html(settings['modal_title']);

	};

})(jQuery);

$('.modal_j').addClass('modal fade');
$('.toastr_button').each(function(i) {
	
	$(this).click(function() {
		toastr.success('操作成功');
	});
});

