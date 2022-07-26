jQuery(document).ready(function($) {
	$(document).on('click', '.select-easyazon', EasyAzon_Addition_Localization_Specs.launchPopup);
});

EasyAzon_Addition_Localization_Specs.launchPopup = function(event) {
	event.preventDefault();

	var $this  = jQuery(this),
		locale = $this.data('locale');

	window.easyAzonLocalizationSpecLocale = locale;
	window.easyAzonLocalizationSpec       = true;

	var editor = EasyAzon_Addition_Localization_Specs.stateName,
		iframe = jQuery('.media-iframe iframe').get(0),
		workflow = wp.media.editor.add(editor, {
			frame: 'post',
			state: EasyAzon_Addition_Localization_Specs.stateName,
			title: EasyAzon_Addition_Localization_Specs.stateTitle
		});

	if(iframe) {
		var contentWindow = iframe.contentWindow ? iframe.contentWindow : iframe;

		if(contentWindow.EasyAzon_Popup) {
			contentWindow.EasyAzon_Popup.reset();
		}
	}

	workflow.once('open', function() {
		jQuery('.media-frame').addClass('hide-menu');
	});

	workflow.once('close', function() {
		jQuery('.media-frame').removeClass('hide-menu');
	});

	wp.media.editor.open(editor, {
		title: EasyAzon_Addition_Localization_Specs.stateTitle
	});
};
