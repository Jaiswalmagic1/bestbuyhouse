jQuery(function($) {
	$('.easyazon-notice-btn').on('click', function() {
		var action = $(this).data("action");
		$.post(easyazon_ajax_object.ajaxurl, {'action':action}, function(res) {
			$('#easyazon-notice-review').fadeOut('slow');
		});
	});
});