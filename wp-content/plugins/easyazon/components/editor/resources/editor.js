/*
 * jQuery plugin: fieldSelection - v0.1.1 - last change: 2006-12-16
 * (c) 2006 Alex Brem <alex@0xab.cd> - http://blog.0xab.cd
 */
(function(){var fieldSelection={getSelection:function(){var e=(this.jquery)?this[0]:this;return(('selectionStart'in e&&function(){var l=e.selectionEnd-e.selectionStart;return{start:e.selectionStart,end:e.selectionEnd,length:l,text:e.value.substr(e.selectionStart,l)}})||(document.selection&&function(){e.focus();var r=document.selection.createRange();if(r===null){return{start:0,end:e.value.length,length:0}}var re=e.createTextRange();var rc=re.duplicate();re.moveToBookmark(r.getBookmark());rc.setEndPoint('EndToStart',re);return{start:rc.text.length,end:rc.text.length+r.text.length,length:r.text.length,text:r.text}})||function(){return null})()},replaceSelection:function(){var e=(typeof this.id=='function')?this.get(0):this;var text=arguments[0]||'';return(('selectionStart'in e&&function(){e.value=e.value.substr(0,e.selectionStart)+text+e.value.substr(e.selectionEnd,e.value.length);return this})||(document.selection&&function(){e.focus();document.selection.createRange().text=text;return this})||function(){e.value+=text;return jQuery(e)})()}};jQuery.each(fieldSelection,function(i){jQuery.fn[i]=this})})();

jQuery(document).ready(function($) {
	$(document).on('click', '.insert-easyazon, #wp_fs_easyazon', EasyAzon_Editor.launchPopup);
});

EasyAzon_Editor.getSelection = function() {
	var editor    = wp.media.editor.id(),
		range     = null,
		selection = '';

	if(('undefined' !== typeof tinyMCE) && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden()) {
		selection = tinyMCE.activeEditor.selection.getContent();
	} else if(editor) {
		range = jQuery('#' + editor).getSelection();
		selection = range && range.text ? range.text : '';
	}

	return jQuery.trim(selection);
};

EasyAzon_Editor.launchPopup = function(event) {
	event.preventDefault();

	window.easyAzonSelection = EasyAzon_Editor.getSelection();

	var editor = EasyAzon_Editor.stateName,
		iframe = jQuery('.media-iframe iframe').get(0),
		workflow = wp.media.editor.add(editor, {
			frame: 'post',
			state: EasyAzon_Editor.stateName,
			title: EasyAzon_Editor.stateTitle
		});

	if(iframe) {
		var contentWindow = iframe.contentWindow ? iframe.contentWindow : iframe;

		if(contentWindow.EasyAzon_Popup) {
			contentWindow.EasyAzon_Popup.reset();
		}
	}

	wp.media.editor.open(editor, {
		title: EasyAzon_Editor.stateTitle
	});
};
